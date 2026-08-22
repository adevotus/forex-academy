<?php

use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Admin\MentorshipController as AdminMentorshipController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\PreferencesController as AdminPreferencesController;
use App\Http\Controllers\Admin\PricingController as AdminPricingController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\RobotController as AdminRobotController;
use App\Http\Controllers\Admin\SignalController as AdminSignalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Member\BillingController;
use App\Http\Controllers\Member\CourseController;
use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\MentorshipController;
use App\Http\Controllers\Member\PendingController;
use App\Http\Controllers\Member\RobotController;
use App\Http\Controllers\Member\SignalController;
use App\Http\Controllers\PublicSiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public marketing website
|--------------------------------------------------------------------------
*/
Route::get('/', [PublicSiteController::class, 'home'])->name('home');
Route::get('/about', [PublicSiteController::class, 'about'])->name('about');
Route::get('/courses', [PublicSiteController::class, 'courses'])->name('courses.index');
Route::get('/courses/{course:slug}', [PublicSiteController::class, 'courseShow'])->name('courses.show');
Route::get('/robots', [PublicSiteController::class, 'robots'])->name('robots.index');
Route::get('/pricing', [PublicSiteController::class, 'pricing'])->name('pricing');

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
Route::middleware('auth')->post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

/*
|--------------------------------------------------------------------------
| Member area — requires login. Approval is enforced by member.approved
| middleware on everything except the "pending approval" screen itself.
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('dashboard')->name('member.')->group(function () {
    Route::get('/pending', [PendingController::class, 'show'])->name('pending');
    Route::post('/pending/proof', [PendingController::class, 'submitProof'])->name('pending.proof');

    Route::middleware('member.approved')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
        Route::post('/courses/{course:slug}/unlock', [CourseController::class, 'requestUnlock'])->name('courses.unlock');
        Route::get('/courses/{course:slug}/lessons/{lesson}', [CourseController::class, 'lesson'])->name('courses.lesson');
        Route::post('/courses/{course:slug}/lessons/{lesson}/complete', [CourseController::class, 'complete'])->name('courses.lesson.complete');
        Route::post('/courses/{course:slug}/lessons/{lesson}/quiz', [CourseController::class, 'submitQuiz'])->name('courses.lesson.quiz');

        Route::get('/robots', [RobotController::class, 'index'])->name('robots.index');
        Route::get('/robots/{robot:slug}', [RobotController::class, 'show'])->name('robots.show');
        Route::post('/robots/{robot:slug}/unlock', [RobotController::class, 'requestUnlock'])->name('robots.unlock');

        Route::get('/signals', [SignalController::class, 'index'])->name('signals.index');
        Route::post('/signals/unlock', [SignalController::class, 'requestUnlock'])->name('signals.unlock');

        Route::get('/mentorship', [MentorshipController::class, 'index'])->name('mentorship.index');
        Route::post('/mentorship/{session}/book', [MentorshipController::class, 'book'])->name('mentorship.book');

        Route::get('/billing', [BillingController::class, 'index'])->name('billing.index');
    });
});

/*
|--------------------------------------------------------------------------
| Admin area — requires login + admin role.
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/notifications', [AdminDashboardController::class, 'notifications'])->name('notifications');

    // Members
    Route::get('/members', [AdminMemberController::class, 'index'])->name('members.index');
    Route::get('/members/{member}', [AdminMemberController::class, 'show'])->name('members.show');
    Route::put('/members/{member}', [AdminMemberController::class, 'update'])->name('members.update');
    Route::post('/members/{member}/approve', [AdminMemberController::class, 'approve'])->name('members.approve');
    Route::post('/members/{member}/suspend', [AdminMemberController::class, 'suspend'])->name('members.suspend');

    // Member login sessions
    Route::delete('/members/{member}/sessions/{session}', [AdminMemberController::class, 'revokeSession'])->name('members.sessions.revoke');
    Route::delete('/members/{member}/sessions', [AdminMemberController::class, 'clearSessions'])->name('members.sessions.clear');

    Route::resource('courses', AdminCourseController::class)->except(['show']);
    Route::get('/courses/{course}/lessons/create', [AdminLessonController::class, 'create'])->name('courses.lessons.create');
    Route::post('/courses/{course}/lessons', [AdminLessonController::class, 'store'])->name('courses.lessons.store');
    Route::get('/courses/{course}/lessons/{lesson}/edit', [AdminLessonController::class, 'edit'])->name('courses.lessons.edit');
    Route::put('/courses/{course}/lessons/{lesson}', [AdminLessonController::class, 'update'])->name('courses.lessons.update');
    Route::delete('/courses/{course}/lessons/{lesson}', [AdminLessonController::class, 'destroy'])->name('courses.lessons.destroy');

    Route::resource('robots', AdminRobotController::class)->except(['show']);
    Route::resource('signals', AdminSignalController::class)->except(['show']);
    Route::resource('mentorship', AdminMentorshipController::class)->except(['show']);

    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/{payment}/approve', [AdminPaymentController::class, 'approve'])->name('payments.approve');
    Route::post('/payments/{payment}/reject', [AdminPaymentController::class, 'reject'])->name('payments.reject');

    // Profile
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');

    // Preferences
    Route::get('/preferences', [AdminPreferencesController::class, 'index'])->name('preferences');
    Route::put('/preferences', [AdminPreferencesController::class, 'update'])->name('preferences.update');

    // Pricing
    Route::get('/pricing', [AdminPricingController::class, 'index'])->name('pricing');
    Route::put('/pricing/settings', [AdminPricingController::class, 'updateSettings'])->name('pricing.settings');
    Route::put('/pricing/courses', [AdminPricingController::class, 'updateCourses'])->name('pricing.courses');
    Route::put('/pricing/robots', [AdminPricingController::class, 'updateRobots'])->name('pricing.robots');
    Route::put('/pricing/mentorship', [AdminPricingController::class, 'updateMentorship'])->name('pricing.mentorship');
});
