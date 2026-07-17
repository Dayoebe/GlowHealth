<?php

namespace App\Livewire\Settings;

use App\Concerns\ProfileValidationRules;
use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Profile settings')]
class Profile extends Component
{
    use ProfileValidationRules;

    public string $name = '';

    public string $email = '';

    public string $account_type = 'community_member';

    public string $account_type_other = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->account_type = Auth::user()->account_type ?? 'community_member';
        $this->account_type_other = Auth::user()->account_type_other ?? '';
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            ...$this->profileRules($user->id),
            'account_type' => ['required', 'string', Rule::in(array_keys(User::accountTypes()))],
            'account_type_other' => ['nullable', 'string', 'max:120', 'required_if:account_type,other'],
        ]);

        $requestedRole = $validated['account_type'];
        $requestedOther = $requestedRole === 'other' ? $validated['account_type_other'] : null;

        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if (! $user->is_super_admin && ($requestedRole !== $user->account_type || $requestedOther !== $user->account_type_other)) {
            $user->requested_account_type = $requestedRole;
            $user->requested_account_type_other = $requestedOther;
            $user->role_change_requested_at = now();
            $this->account_type = $user->account_type;
            $this->account_type_other = $user->account_type_other ?? '';
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $message = $user->role_change_requested_at ? 'Profile updated. Your role change is awaiting super-admin approval.' : 'Profile updated.';
        $this->dispatch('notify', message: $message);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        $this->dispatch('notify', message: __('A new verification link has been sent to your email address.'));
    }

    #[Computed]
    public function hasUnverifiedEmail(): bool
    {
        $user = Auth::user();

        return $user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail();
    }

    #[Computed]
    public function showDeleteUser(): bool
    {
        $user = Auth::user();

        return ! $user instanceof MustVerifyEmail || $user->hasVerifiedEmail();
    }
}
