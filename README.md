# EMMIOXFOREX ACADEMY — Laravel 11 Platform

A full Laravel 11 implementation of the EMMIOXFOREX ACADEMY platform: a public marketing
site, a **Member** learning dashboard, and an **Admin** control panel — built around the
two-role, pay-to-unlock system described in the project brief.

## What's inside

- **Public website** — home, about, courses catalog, course detail, robots, pricing
- **Auth** — register (creates a pending registration-fee payment automatically) & login
- **Member dashboard** — leveled courses (Starter → Pro) with lessons, video placeholder,
  quick quizzes, progress tracking and badges; Robots/EA subscriptions; 3-month Signals;
  Mentorship booking; Billing history
- **Admin panel** — overview stats, member approval queue, **payments approval queue**
  (approving a payment automatically grants the member access — see
  `app/Services/PaymentApprovalService.php`), full CRUD for Courses/Lessons, Robots,
  Signals, and Mentorship packages
- **Premium design** — custom Tailwind theme (deep navy + electric blue + gold accents,
  glass cards, glow shadows) shared across the public site, member area and admin panel,
  built with reusable Blade layout components and a small icon component library

## Requirements

- PHP 8.2+
- Composer
- Node.js 18+ / npm
- SQLite (bundled with PHP) — or MySQL if you prefer

## Setup

This project was built in a sandboxed environment without access to Packagist/npm
registries at build time, so dependencies aren't installed yet. On your own machine:

```bash
# 1. Install PHP dependencies
composer install

# 2. Install frontend dependencies
npm install

# 3. Environment
cp .env.example .env
php artisan key:generate

# 4. Database (SQLite by default — fastest way to try it)
touch database/database.sqlite
php artisan migrate --seed

# 5. Build frontend assets
npm run build
# (or `npm run dev` while developing, alongside `php artisan serve`)

# 6. Serve
php artisan serve
```

Visit `http://localhost:8000`.

### Demo accounts (created by the seeder)

| Role   | Email                          | Password |
|--------|---------------------------------|----------|
| Admin  | admin@emmioxforex.academy       | password |
| Member (approved) | member@emmioxforex.academy | password |
| Member (pending)  | pending@emmioxforex.academy | password |

### Switching to MySQL

Edit `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=emmiox_academy
DB_USERNAME=root
DB_PASSWORD=
```
Then create the database and run `php artisan migrate --seed`.

## How the access/unlock system works

1. A member registers → a `Payment` record (`type = registration`) is created automatically
   with `status = pending`, and the account itself is `status = pending`.
2. An Admin reviews **Admin → Payments** and clicks **Approve**.
3. `PaymentApprovalService::approve()` runs inside a DB transaction and, depending on the
   payment's `type`, either:
   - marks the user `approved` (registration),
   - creates a `UserUnlock` row for a `Course` (course purchase),
   - creates a `UserUnlock` + `RobotSubscription` with an expiry date (robot/EA),
   - creates a `SignalSubscription` valid for 3 months (signal subscription),
   - confirms a `MentorshipBooking` (mentorship).
4. Blade views and controllers check access via `Course::isUnlockedFor($user)`,
   `Robot::isUnlockedFor($user)`, and `User::hasActiveSignalSubscription()`.

This keeps the whole "admin approves → member gets access" flow in one auditable place,
so you can later swap the manual approval step for a real payment gateway (Stripe,
Flutterwave, Paystack, etc.) without touching the unlock logic itself.

## Project structure highlights

```
app/
  Http/Controllers/
    Admin/          Admin panel controllers (members, payments, courses, lessons, robots, signals, mentorship)
    Member/          Member dashboard controllers
    Auth/            Register / Login
  Http/Middleware/
    EnsureUserIsAdmin.php
    EnsureUserIsApprovedMember.php
  Models/            Eloquent models for every entity in the platform
  Services/
    PaymentApprovalService.php   <- core "approve payment -> grant access" logic
  View/Components/
    Icon.php         Small reusable line-icon component

database/migrations/  Full schema: users(role/status), courses, lessons, quizzes,
                       lesson_progress, badges, cheat_sheets, robots, robot_subscriptions,
                       signals, signal_subscriptions, mentorship_sessions/bookings,
                       payments, user_unlocks
database/seeders/      Demo admin/members, 4 leveled courses w/ lessons+quizzes,
                       2 robots, 3 signals, 2 mentorship packages

resources/views/
  components/layouts/  app.blade.php (base HTML), public.blade.php, member.blade.php, admin.blade.php
  public/              Marketing site pages
  auth/                Login / Register
  member/               Dashboard, courses, robots, signals, mentorship, billing
  admin/                Dashboard, members, payments, courses, lessons, robots, signals, mentorship

resources/css/app.css   Tailwind + the EMMIOXFOREX brand theme (navy/brand/gold palette,
                         .btn-primary / .btn-gold / .card / .badge-level-* component classes)
tailwind.config.js       Custom color palette + glow shadows
```

## Next steps you may want

- Wire a real payment gateway into the `Payment` unlock-request endpoints so members can
  pay online instead of the admin manually confirming a bank/mobile-money reference.
- Add real video hosting (S3/Bunny/Mux) — `lessons.video_url` is ready for this.
- Add file uploads for Robot EA files and course cheat sheets (`Storage::disk('public')`).
- Add email notifications when a member is approved or a payment is confirmed.
- Add a `php artisan make:test` suite — the architecture (service class + thin controllers)
  is written to be test-friendly.

---

**Risk Disclosure:** Forex and leveraged trading involve substantial risk and may result in
partial or complete loss of capital. Trading signals, automated systems, mentorship, account
management, and account-flipping services do not guarantee profits or future performance.
