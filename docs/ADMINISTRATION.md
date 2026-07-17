# Administration and Permissions

Glow Health separates a person's participation role from their platform privilege.

## Participation role versus privilege

A healthcare professional may also be an administrator. A community representative may remain a normal user. These are separate concepts:

- **Participation role** controls dashboard guidance and relevant menus.
- **Administrative privilege** controls protected operational authority.

## Privilege levels

### User

A normal user can:

- access their role-aware dashboard;
- update profile information;
- request a participation-role change;
- manage account security;
- view assigned tasks;
- access public information.

### Administrator

An administrator can:

- access `/admin`;
- view the administration workspace;
- delegate tasks;
- trigger assignment emails;
- view recent delegated work;
- access administrator navigation.

An administrator cannot:

- create another administrator;
- create a super administrator;
- elevate or downgrade privileges;
- approve participation-role changes reserved for super administrators;
- modify the root super administrator.

### Super administrator

A super administrator can:

- perform administrator actions;
- approve or reject participation-role requests;
- elevate a user to Administrator;
- elevate a user to Super Administrator;
- downgrade administrators or other super administrators;
- access the full super-administrator navigation.

## Root super administrator

The protected root identity is:

```text
super@admin.com
```

Safeguards:

- it is excluded from the privilege selector;
- it cannot be downgraded through the administration action;
- administrators cannot manage privileges;
- a super administrator cannot change their own privilege through the selector.

Do not document or commit the root password.

## Authorization gates

Defined in `App\Providers\AppServiceProvider`:

| Gate | Granted to | Purpose |
| --- | --- | --- |
| `access-administration` | Admin and super admin | Enter `/admin` |
| `manage-platform` | Super admin | Approve or reject role changes |
| `manage-administrators` | Super admin | Elevate and downgrade privileges |

The `/admin` route uses `can:access-administration`.

Sensitive Livewire actions authorize again inside the component. Route access alone does not grant privilege-management authority.

## Privilege management workflow

1. Sign in as a super administrator.
2. Open `/admin`.
3. Find “Elevate or downgrade a user.”
4. Select the user.
5. Select User, Administrator, or Super Administrator.
6. Confirm the change.
7. The `is_admin` and `is_super_admin` flags are updated as mutually exclusive values.

The user's participation role is not changed.

## Participation-role approval

1. A user changes the desired role in Profile Settings.
2. Glow Health stores `requested_account_type`.
3. The request appears in the super-admin approval queue.
4. Approval copies the requested role to the active role.
5. Rejection clears the requested role.

Super-admin accounts cannot submit or receive ordinary role-change approval in the same way.

## Task delegation

The administration form accepts:

- recipient;
- title;
- instructions;
- due date.

The task records:

- `assigned_by`;
- `assigned_to`;
- `title`;
- `description`;
- `due_at`;
- `status`.

After creation:

1. the task appears in the user's dashboard;
2. Laravel sends `TaskAssigned`;
3. the notification includes task context and a dashboard link;
4. failures are reported and logged without removing the task.

## Email operations

Production should use a verified SMTP provider or transactional mail service.

Recommended operational checks:

- verified sender identity;
- valid `APP_URL`;
- TLS-enabled SMTP;
- queue workers when notifications become queued;
- delivery monitoring;
- bounce handling;
- retry policy;
- notification audit history.

## Creating the first super administrator

Use Tinker in the target environment. Do not store a plaintext password in source control:

```bash
php artisan tinker
```

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$user = User::updateOrCreate(
    ['email' => 'super@admin.com'],
    [
        'name' => 'Super Administrator',
        'password' => Hash::make('replace-with-a-strong-secret'),
        'account_type' => 'staff',
    ],
);

$user->forceFill([
    'is_super_admin' => true,
    'is_admin' => false,
    'email_verified_at' => now(),
])->save();
```

Change temporary credentials immediately.

## Production recommendations

Before broad administrative deployment, add:

- privilege-change audit records;
- reason fields for elevation and downgrade;
- notifications when privilege changes;
- optional expiry for temporary administrators;
- task status history;
- administrator activity logs;
- database-backed in-app notifications;
- automated authorization tests;
- recovery procedure for the root account;
- a requirement for two-factor authentication on all privileged accounts.

