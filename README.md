# Glow Health Outreach Initiative

Glow Health is a role-aware healthcare outreach platform for connecting communities, volunteers, healthcare professionals, representatives, partners, staff, and administrators around accessible community healthcare.

The application combines a public information website with authenticated dashboards tailored to each participant. It supports account security, participation-role governance, administrative privilege management, task delegation, and email notifications.

## Purpose

Glow Health is designed to help the initiative:

- publish healthcare services and upcoming outreach information;
- help residents understand how to participate and prepare;
- coordinate volunteers and healthcare professionals;
- receive community outreach and partnership interest;
- give every participant a clear role, responsibilities, and next steps;
- protect role changes through an approval workflow;
- delegate operational tasks and notify assignees by email;
- provide administrators with a protected coordination workspace.

## Documentation

- [Complete feature guide](docs/FEATURES.md)
- [Administration and permissions](docs/ADMINISTRATION.md)
- [Role-aware navigation configuration](config/navigation.php)

## Technology

- PHP 8.3+
- Laravel 13
- Livewire 4
- Laravel Fortify
- Laravel Passkeys
- Alpine.js
- Tailwind CSS
- Vite
- MySQL or SQLite
- Laravel Notifications and SMTP
- Font Awesome

## Implemented public pages

| Route | Purpose |
| --- | --- |
| `/` | Initiative homepage and public overview |
| `/services` | Healthcare services |
| `/outreach` | Outreach information |
| `/volunteer` | Volunteer participation |
| `/partner` | Partnership and sponsorship |
| `/impact` | Community impact |
| `/contact` | Contact and outreach enquiries |

The public website uses the Glow Health navy-blue and orange identity, a shared responsive shell, PWA metadata, icons, and installable assets.

## Accounts and participation roles

People select a participation category when registering:

- Community member
- Volunteer
- Healthcare professional
- Partner or sponsor
- Community representative
- Glow Health staff
- Other/custom participant

Participation roles describe how a person engages with the initiative. They do not grant administrative authority.

Each role receives a tailored dashboard with:

- a role explanation and purpose;
- core responsibilities;
- recommended activities and timing;
- next steps;
- relevant actions and public resources;
- account readiness information;
- assigned operational tasks.

## Administrative privileges

Administrative authority is stored separately from participation roles.

| Privilege | Access |
| --- | --- |
| User | Normal role-aware dashboard |
| Administrator | Administration workspace and task delegation |
| Super administrator | Full administration, role approvals, and privilege management |

The root super-administrator account is identified by `super@admin.com`. Its password must never be committed to this repository or included in documentation.

See [Administration and permissions](docs/ADMINISTRATION.md) for the complete authority model.

## Authentication and security

The application currently supports:

- registration and login;
- password reset;
- email verification;
- password confirmation before sensitive settings;
- password visibility controls;
- two-factor authentication;
- passkeys/WebAuthn;
- account security settings;
- profile deletion;
- light, dark, and system appearance modes.

Sensitive settings require an authenticated and verified account. Password-confirmed routes use a branded authenticated confirmation screen.

## Role-change workflow

A user cannot silently replace their active participation role.

1. The user selects a different role from Profile Settings.
2. The requested role is stored separately from the active role.
3. The active dashboard and permissions remain unchanged.
4. A super administrator reviews the request.
5. The super administrator approves or rejects it.
6. Approval replaces the active role; rejection clears the request.

## Task delegation and email

Administrators can delegate a task with:

- an assignee;
- a task title;
- instructions;
- an optional due date;
- an initial `assigned` status.

The task appears on the recipient’s dashboard. After it is created, Glow Health sends an email containing the task details, assigner, due date, and a dashboard link.

If delivery fails, the task remains saved, the exception is logged, and the administrator receives a delivery warning.

## Configurable navigation

Authenticated navigation is defined in [`config/navigation.php`](config/navigation.php).

The file contains:

- shared menu groups;
- role-specific menu groups;
- administrator menus;
- super-administrator menus;
- icons;
- existing route names;
- `#` placeholders for planned modules.

Example:

```php
[
    'label' => 'My assignments',
    'icon' => 'fa-clipboard-check',
    'href' => '#',
]
```

When the feature route exists:

```php
[
    'label' => 'My assignments',
    'icon' => 'fa-clipboard-check',
    'route' => 'volunteer.assignments',
]
```

Navigation visibility is a presentation feature, not an authorization boundary. New protected routes must also use middleware, gates, or policies.

## Local installation

```bash
git clone https://github.com/Dayoebe/GlowHealth.git
cd GlowHealth
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

Open `http://localhost:8000`.

For this workspace, the compatible Herd PHP executable is:

```bash
/home/olamilekan/.config/herd-lite/bin/php
```

Example:

```bash
/home/olamilekan/.config/herd-lite/bin/php artisan migrate
```

## Environment configuration

Set the application identity:

```dotenv
APP_NAME="Glow Health Outreach Initiative"
APP_URL=http://localhost:8000
```

Configure either SQLite or MySQL. Example MySQL values:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=health
DB_USERNAME=root
DB_PASSWORD=
```

Never commit production database or email credentials.

## Email configuration

Task notifications and authentication emails use Laravel's configured mailer.

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your-account
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=notifications@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

For local development without sending real email:

```dotenv
MAIL_MAILER=log
```

Messages will be written to `storage/logs/laravel.log`.

## Development commands

```bash
# Development services
composer dev

# Frontend production build
npm run build

# Format PHP
php vendor/bin/pint

# Static analysis
composer types:check

# Compile Blade templates
php artisan view:clear
php artisan view:cache

# Apply database changes
php artisan migrate
```

## Continuous integration

GitHub Actions validates the application against PHP 8.3, 8.4, and 8.5. The workflow installs PHP and Node dependencies, builds frontend assets, runs Larastan, and invokes PHPUnit.

The repository currently contains no project test cases because they were intentionally removed. PHPUnit therefore completes with “No tests found.” New modules should restore focused authorization and workflow coverage before production deployment.

## Important directories

| Path | Responsibility |
| --- | --- |
| `app/Livewire` | Livewire pages and authenticated workflows |
| `app/Models` | Users and delegated tasks |
| `app/Notifications` | Task-assignment email |
| `app/Providers` | Fortify views and authorization gates |
| `config/navigation.php` | Role-aware navigation |
| `database/migrations` | Account, privilege, and task schema |
| `resources/views/livewire` | Public, auth, settings, and admin interfaces |
| `resources/views/layouts` | Shared public, auth, and account layouts |
| `routes/web.php` | Public, dashboard, and administration routes |
| `routes/settings.php` | Profile, appearance, and security routes |

## Current scope and roadmap

Several menu entries intentionally point to `#`. They describe the planned product structure but are not implemented routes yet.

Planned modules include:

- outreach creation and registration;
- volunteer applications, attendance, hours, and certificates;
- healthcare credential verification and clinical assignments;
- community needs assessments and outreach requests;
- partnership proposals, contributions, and accountability reports;
- inventory, venues, logistics, referrals, and incident management;
- announcements, email campaigns, and SMS campaigns;
- analytics, exports, audit logs, and content management;
- task status updates, comments, completion, and reminders.

The feature guide identifies implemented and planned capabilities separately.

## Security notes

- Never treat a hidden menu link as authorization.
- Never grant staff access merely because a user selected “staff.”
- Never allow a user to approve their own role or privilege change.
- The root super administrator cannot be downgraded in the UI.
- Keep production passwords, SMTP credentials, and application keys outside Git.
- Add audit history before expanding privilege management in production.
- Add automated authorization tests before handling sensitive clinical data.

## Brand

Glow Health uses navy blue as the main structural colour and orange for calls to action and emphasis. Supporting clinical colours may be used where they improve clarity, while navy and orange remain visually dominant.

