<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Performance Indexes — EMMIOXFOREX ACADEMY
 *
 * Covers every frequently-run query observed in the controllers:
 *  - Admin member listing/filtering by role+status
 *  - Payment admin queue (pending/approved)
 *  - Course & lesson ordering
 *  - Lesson progress lookups per user
 *  - Signal feed by status + date
 *  - Subscription active-check (robots, signals)
 *  - User unlock polymorphic lookups
 *  - Site visitor IP+time cooldown check
 *  - Login session history per user
 *
 * All index names are explicit to make them easy to drop individually
 * if any is found to hurt INSERT performance in the future.
 */
return new class extends Migration
{
    public function up(): void
    {
        // ── users ──────────────────────────────────────────────────────────────
        // DashboardController: WHERE role='member' AND status='pending/approved'
        // MemberController:    WHERE role='member' ORDER BY created_at DESC
        Schema::table('users', function (Blueprint $table) {
            $table->index(['role', 'status'],      'idx_users_role_status');
            $table->index(['role', 'created_at'],  'idx_users_role_created');
        });

        // ── courses ────────────────────────────────────────────────────────────
        // Member course list: WHERE published=1 ORDER BY order ASC
        Schema::table('courses', function (Blueprint $table) {
            $table->index(['published', 'order'], 'idx_courses_published_order');
        });

        // ── lessons ────────────────────────────────────────────────────────────
        // Course page: WHERE course_id=? ORDER BY order ASC
        // Preview check: WHERE course_id=? AND is_preview=1
        Schema::table('lessons', function (Blueprint $table) {
            $table->index(['course_id', 'order'],      'idx_lessons_course_order');
            $table->index(['course_id', 'is_preview'], 'idx_lessons_course_preview');
        });

        // ── lesson_progress ────────────────────────────────────────────────────
        // Lesson view: WHERE user_id=? AND completed=1 (to show sidebar ticks)
        // Note: unique(user_id, lesson_id) already covers exact-row lookups.
        Schema::table('lesson_progress', function (Blueprint $table) {
            $table->index(['user_id', 'completed'], 'idx_lesson_progress_user_completed');
        });

        // ── signals ────────────────────────────────────────────────────────────
        // Signal feed: WHERE status='active' ORDER BY published_at DESC
        Schema::table('signals', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'idx_signals_status_published');
        });

        // ── mentorship_sessions ────────────────────────────────────────────────
        // Public listing: WHERE published=1
        Schema::table('mentorship_sessions', function (Blueprint $table) {
            $table->index(['published'], 'idx_mentorship_sessions_published');
        });

        // ── mentorship_bookings ────────────────────────────────────────────────
        // Member booking history: WHERE user_id=? AND status=?
        Schema::table('mentorship_bookings', function (Blueprint $table) {
            $table->index(['user_id', 'status'], 'idx_mentorship_bookings_user_status');
        });

        // ── payments ───────────────────────────────────────────────────────────
        // Admin queue:   WHERE status='pending' (+ proof_path NOT NULL)
        // Revenue total: WHERE status='approved'
        // Member view:   WHERE user_id=? AND status=?
        // Recent list:   WHERE status='pending' ORDER BY created_at DESC
        Schema::table('payments', function (Blueprint $table) {
            $table->index(['status'],               'idx_payments_status');
            $table->index(['user_id', 'status'],    'idx_payments_user_status');
            $table->index(['status', 'created_at'], 'idx_payments_status_created');
        });

        // ── user_unlocks ───────────────────────────────────────────────────────
        // Polymorphic reverse lookup: all users who unlocked item X
        // Note: unique(user_id, unlockable_type, unlockable_id) covers per-user
        // lookups; this index helps admin-side queries scanning by item.
        Schema::table('user_unlocks', function (Blueprint $table) {
            $table->index(['unlockable_type', 'unlockable_id'], 'idx_user_unlocks_unlockable');
        });

        // ── user_login_sessions ────────────────────────────────────────────────
        // Member profile: WHERE user_id=? ORDER BY last_seen_at DESC
        // Note: unique(user_id, ip_address) covers the upsert; this covers ordering.
        Schema::table('user_login_sessions', function (Blueprint $table) {
            $table->index(['user_id', 'last_seen_at'], 'idx_login_sessions_user_seen');
        });

        // ── robot_subscriptions ────────────────────────────────────────────────
        // Access check: WHERE user_id=? AND status='active'
        // Expiry cron:  WHERE expires_at < now() AND status='active'
        Schema::table('robot_subscriptions', function (Blueprint $table) {
            $table->index(['user_id', 'status'], 'idx_robot_subs_user_status');
            $table->index(['expires_at'],         'idx_robot_subs_expires');
        });

        // ── signal_subscriptions ───────────────────────────────────────────────
        // Access check: WHERE user_id=? AND status='active'
        // Expiry cron:  WHERE expires_at < now() AND status='active'
        Schema::table('signal_subscriptions', function (Blueprint $table) {
            $table->index(['user_id', 'status'], 'idx_signal_subs_user_status');
            $table->index(['expires_at'],         'idx_signal_subs_expires');
        });

        // ── site_visits ────────────────────────────────────────────────────────
        // Cooldown check: WHERE ip_address=? AND visited_at >= now()-3h
        // The composite covers both the equality filter and the range filter,
        // which is more efficient than the single ip_address index already there.
        Schema::table('site_visits', function (Blueprint $table) {
            $table->index(['ip_address', 'visited_at'], 'idx_site_visits_ip_time');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('idx_users_role_status');
            $table->dropIndex('idx_users_role_created');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropIndex('idx_courses_published_order');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropIndex('idx_lessons_course_order');
            $table->dropIndex('idx_lessons_course_preview');
        });
        Schema::table('lesson_progress', function (Blueprint $table) {
            $table->dropIndex('idx_lesson_progress_user_completed');
        });
        Schema::table('signals', function (Blueprint $table) {
            $table->dropIndex('idx_signals_status_published');
        });
        Schema::table('mentorship_sessions', function (Blueprint $table) {
            $table->dropIndex('idx_mentorship_sessions_published');
        });
        Schema::table('mentorship_bookings', function (Blueprint $table) {
            $table->dropIndex('idx_mentorship_bookings_user_status');
        });
        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex('idx_payments_status');
            $table->dropIndex('idx_payments_user_status');
            $table->dropIndex('idx_payments_status_created');
        });
        Schema::table('user_unlocks', function (Blueprint $table) {
            $table->dropIndex('idx_user_unlocks_unlockable');
        });
        Schema::table('user_login_sessions', function (Blueprint $table) {
            $table->dropIndex('idx_login_sessions_user_seen');
        });
        Schema::table('robot_subscriptions', function (Blueprint $table) {
            $table->dropIndex('idx_robot_subs_user_status');
            $table->dropIndex('idx_robot_subs_expires');
        });
        Schema::table('signal_subscriptions', function (Blueprint $table) {
            $table->dropIndex('idx_signal_subs_user_status');
            $table->dropIndex('idx_signal_subs_expires');
        });
        Schema::table('site_visits', function (Blueprint $table) {
            $table->dropIndex('idx_site_visits_ip_time');
        });
    }
};
