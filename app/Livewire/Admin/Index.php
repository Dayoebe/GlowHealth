<?php

namespace App\Livewire\Admin;

use App\Models\DelegatedTask;
use App\Models\User;
use App\Notifications\TaskAssigned;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Throwable;

#[Layout('layouts.app')]
#[Title('Administration control centre')]
class Index extends Component
{
    public string $privilege_user = '';

    public string $privilege_level = 'user';

    public string $assigned_to = '';

    public string $task_title = '';

    public string $task_description = '';

    public string $due_at = '';

    public function approveRoleChange(int $userId): void
    {
        $this->authorize('manage-platform');

        $user = User::query()->findOrFail($userId);

        abort_if($user->is_super_admin || ! $user->requested_account_type, 422);

        $user->forceFill([
            'account_type' => $user->requested_account_type,
            'account_type_other' => $user->requested_account_type === 'other' ? $user->requested_account_type_other : null,
            'requested_account_type' => null,
            'requested_account_type_other' => null,
            'role_change_requested_at' => null,
        ])->save();

        $this->dispatch('notify', message: 'Role change approved.');
    }

    public function rejectRoleChange(int $userId): void
    {
        $this->authorize('manage-platform');

        User::query()->whereKey($userId)->where('is_super_admin', false)->update([
            'requested_account_type' => null,
            'requested_account_type_other' => null,
            'role_change_requested_at' => null,
        ]);

        $this->dispatch('notify', message: 'Role change rejected.');
    }

    public function updatePrivilege(): void
    {
        $this->authorize('manage-administrators');

        $validated = $this->validate([
            'privilege_user' => ['required', 'integer', 'exists:users,id'],
            'privilege_level' => ['required', 'in:user,admin,super_admin'],
        ]);

        $user = User::query()->findOrFail((int) $validated['privilege_user']);
        $privilegeLevel = (string) $validated['privilege_level'];

        abort_if($user->email === 'super@admin.com', 422, 'The root super administrator cannot be downgraded.');
        abort_if($user->is($this->authenticatedUser()), 422, 'You cannot change your own administrative privilege.');

        $user->forceFill([
            'is_admin' => $privilegeLevel === 'admin',
            'is_super_admin' => $privilegeLevel === 'super_admin',
        ])->save();

        $this->reset('privilege_user');
        $this->privilege_level = 'user';
        $this->dispatch('notify', message: "Administrative privilege updated for {$user->name}.");
    }

    public function delegateTask(): void
    {
        $validated = $this->validate([
            'assigned_to' => ['required', 'integer', 'exists:users,id'],
            'task_title' => ['required', 'string', 'max:160'],
            'task_description' => ['nullable', 'string', 'max:2000'],
            'due_at' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        $assigner = $this->authenticatedUser();
        $assignee = User::query()->findOrFail((int) $validated['assigned_to']);

        $task = DelegatedTask::create([
            'assigned_by' => $assigner->id,
            'assigned_to' => $assignee->id,
            'title' => $validated['task_title'],
            'description' => $validated['task_description'] ?: null,
            'due_at' => $validated['due_at'] ?: null,
        ]);

        $task->setRelation('assignee', $assignee);
        $task->setRelation('assigner', $assigner);

        try {
            $assignee->notify(new TaskAssigned($task));
            $message = "Task delegated and notification email sent to {$assignee->email}.";
        } catch (Throwable $exception) {
            report($exception);
            $message = 'Task delegated, but the notification email could not be sent. Please check the mail configuration.';
        }

        $this->reset('assigned_to', 'task_title', 'task_description', 'due_at');
        $this->dispatch('notify', message: $message);
    }

    public function render(): View
    {
        $user = $this->authenticatedUser();

        return view('livewire.admin.index', [
            'users' => User::query()->whereKeyNot($user->id)->orderBy('name')->get(),
            'privilegeUsers' => User::query()->where('email', '!=', 'super@admin.com')->whereKeyNot($user->id)->orderBy('name')->get(),
            'roleRequests' => $user->is_super_admin
                ? User::query()->whereNotNull('requested_account_type')->oldest('role_change_requested_at')->get()
                : collect(),
            'tasks' => DelegatedTask::query()->with(['assignee', 'assigner'])->latest()->limit(12)->get(),
        ]);
    }

    private function authenticatedUser(): User
    {
        $user = auth()->user();

        abort_unless($user instanceof User, 401);

        return $user;
    }
}
