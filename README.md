# EMMIOXFOREX ACADEMY — Laravel 11 Platform

A full Laravel 11 implementation of the EMMIOXFOREX ACADEMY platform: a public marketing
site, a **Member** learning dashboard, and an **Admin** control panel — built around the
two-role, pay-to-unlock system described in the project brief.


## How the access/unlock system works

This keeps the whole "admin approves → member gets access" flow in one auditable place,
so you can later swap the manual approval step for a real payment gateway (Stripe,
Flutterwave, Paystack, etc.) without touching the unlock logic itself.


**Risk Disclosure:** Forex and leveraged trading involve substantial risk and may result in
partial or complete loss of capital. Trading signals, automated systems, mentorship, account
management, and account-flipping services do not guarantee profits or future performance.
