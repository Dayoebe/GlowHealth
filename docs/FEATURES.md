# Glow Health Feature Guide

This guide documents the public website, authenticated experience, role dashboards, and planned modules.

Status labels:

- **Implemented** — available in the application now.
- **Foundation** — data or navigation exists, but the complete workflow is not built.
- **Planned** — represented by a `#` menu placeholder.

## Public experience

### Public website — Implemented

The public website presents Glow Health's purpose, services, outreach model, volunteer opportunities, partnership pathway, reported impact, and contact information.

Implemented pages:

- Home
- Services
- Outreach
- Volunteer
- Partner
- Impact
- Contact

Public pages share responsive navigation, footer content, brand styling, metadata, PWA assets, and mobile navigation.

### Progressive Web App — Implemented

The application includes:

- web manifest;
- favicons and installable icons;
- theme metadata;
- service worker;
- offline fallback;
- cached public assets and routes.

Authenticated or sensitive responses must not be intentionally added to the public precache.

## Registration and authentication

### Account registration — Implemented

Registration collects:

- name;
- email;
- password and confirmation;
- participation category;
- custom category description when “Other” is selected.

### Authentication — Implemented

- Login and logout
- Remember-me support
- Forgot-password workflow
- Password reset
- Email verification
- Password confirmation
- Two-factor authentication
- Recovery codes
- Passkeys

### Password visibility — Implemented

Password forms use an eye control where the customised interface provides one, including registration and secure password confirmation.

## Profile and account settings

### Profile management — Implemented

Users can update:

- name;
- email;
- requested participation role;
- custom role description.

Changing an email resets verification status.

### Role changes — Implemented

Role changes are requests rather than immediate account mutations. The current role stays active until a super administrator approves the request.

### Security settings — Implemented

- Password update
- Passkey management
- Two-factor authentication
- Account deletion

### Appearance — Implemented

- Light mode
- Dark mode
- System preference

## Role-aware dashboards

Every role dashboard includes:

- role identity;
- account status;
- explanation of why the role matters;
- four role responsibilities;
- practical activities;
- timing guidance;
- recommended next steps;
- quick links;
- upcoming outreach summary;
- initiative impact summary;
- tasks assigned by an administrator.

### Community member

Focus:

- understand available healthcare services;
- prepare for outreach attendance;
- follow verified information;
- register responsibly;
- share feedback.

Planned modules:

- outreach registration;
- registration status;
- saved outreaches;
- eligibility;
- referral information;
- feedback and concern reporting.

### Volunteer

Focus:

- declare availability;
- complete orientation;
- understand safeguarding;
- accept field assignments;
- protect participant dignity.

Planned modules:

- volunteer applications;
- assignments;
- check-in;
- attendance;
- volunteer hours;
- training progress;
- certificates.

### Healthcare professional

Focus:

- submit credentials;
- work within professional scope;
- follow clinical protocols;
- document services;
- escalate referrals and emergencies.

Planned modules:

- credential review;
- clinical assignments;
- care stations;
- patient flow;
- protocol library;
- clinical reporting.

No sensitive patient record system is currently implemented.

### Partner or sponsor

Focus:

- review documented needs;
- propose aligned support;
- define accountability;
- contribute through approved channels;
- review supported impact.

Planned modules:

- partnership proposals;
- organisation profiles;
- contribution tracking;
- agreements;
- project progress;
- accountability reports.

### Community representative

Focus:

- represent local needs accurately;
- coordinate with trusted local structures;
- prepare venues;
- support responsible mobilisation;
- report community feedback.

Planned modules:

- community profiles;
- needs assessments;
- outreach requests;
- venue preparation;
- population information;
- accessibility planning.

### Glow Health staff

Selecting “staff” is an expression of intended participation, not an automatic permission grant.

Focus:

- identity verification;
- account security;
- assigned operational work;
- privacy and reporting requirements.

Planned modules:

- operations calendar;
- field teams;
- logistics;
- registrations;
- supplies;
- reports and communications.

### Other/custom participant

Focus:

- describe intended participation;
- explore available pathways;
- contact the team;
- request a more suitable role.

## Administration

### Administration workspace — Implemented

The protected `/admin` workspace supports:

- task delegation;
- recent delegated-task visibility;
- super-admin role-change approvals;
- privilege elevation and downgrade.

### Task delegation — Implemented

Administrators can assign:

- recipient;
- title;
- instructions;
- optional due date.

New tasks use the `assigned` status and appear in the recipient's dashboard.

### Assignment email — Implemented

The recipient receives:

- task title;
- instructions;
- due date;
- assigner's name;
- dashboard action button.

Delivery exceptions are logged. A failed email does not remove the saved assignment.

### Task lifecycle — Foundation

Task creation and display are implemented.

Planned:

- assignee acknowledgement;
- in-progress status;
- completion;
- comments;
- attachments;
- reminders;
- overdue escalation;
- audit history.

### Administrative privileges — Implemented

- User
- Administrator
- Super administrator

Privileges remain independent from participation roles.

See [Administration and permissions](ADMINISTRATION.md).

## Navigation

### Role-aware navigation — Implemented

`config/navigation.php` contains shared, role, administrator, and super-administrator menu groups.

The renderer:

- detects privilege and participation role;
- merges the relevant groups;
- renders dropdown categories;
- highlights current routes;
- uses “Coming soon” for `#` placeholders;
- supports the mobile sidebar.

## Planned operational modules

### Outreach management

- create and publish outreach;
- registration capacity;
- services and stations;
- venues;
- schedules;
- team assignment;
- check-in;
- referrals;
- incident management.

### People management

- volunteer approval;
- credential verification;
- attendance;
- training;
- performance feedback;
- community contacts;
- partner organisations.

### Inventory and logistics

- medicines;
- consumables;
- equipment;
- stock movement;
- allocations;
- logistics checklists.

### Communication

- announcements;
- in-app notifications;
- email campaigns;
- SMS campaigns;
- templates;
- delivery history.

### Reporting

- outreach performance;
- residents reached;
- services delivered;
- volunteer participation;
- contributions;
- exports;
- accountability reports.

### Content management

- public pages;
- services;
- outreach content;
- news;
- FAQs;
- testimonials;
- media library.

