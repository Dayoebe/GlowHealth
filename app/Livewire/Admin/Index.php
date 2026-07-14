<?php

namespace App\Livewire\Admin;

use App\Models\DelegatedTask;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Super admin control centre')]
class Index extends Component
{
    public string $assigned_to = '';

    public string $task_title = '';

    public string $task_description = '';

    public string $due_at = '';

    public function approveRoleChange(int $userId): void
    {
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
        User::query()->whereKey($userId)->where('is_super_admin', false)->update([
            'requested_account_type' => null,
            'requested_account_type_other' => null,
            'role_change_requested_at' => null,
        ]);

        $this->dispatch('notify', message: 'Role change rejected.');
    }

    public function delegateTask(): void
    {
        $validated = $this->validate([
            'assigned_to' => ['required', 'integer', 'exists:users,id'],
            'task_title' => ['required', 'string', 'max:160'],
            'task_description' => ['nullable', 'string', 'max:2000'],
            'due_at' => ['nullable', 'date', 'after_or_equal:today'],
        ]);

        DelegatedTask::create([
            'assigned_by' => auth()->id(),
            'assigned_to' => $validated['assigned_to'],
            'title' => $validated['task_title'],
            'description' => $validated['task_description'] ?: null,
            'due_at' => $validated['due_at'] ?: null,
        ]);

        $this->reset('assigned_to', 'task_title', 'task_description', 'due_at');
        $this->dispatch('notify', message: 'Task delegated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.index', [
            'users' => User::query()->where('is_super_admin', false)->latest()->get(),
            'roleRequests' => User::query()->whereNotNull('requested_account_type')->oldest('role_change_requested_at')->get(),
            'tasks' => DelegatedTask::query()->with(['assignee', 'assigner'])->latest()->limit(12)->get(),
        ]);
    }
}
