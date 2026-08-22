<?php

namespace App\Services;

use App\Models\Course;
use App\Models\Payment;
use App\Models\Robot;
use App\Models\RobotSubscription;
use App\Models\SignalSubscription;
use App\Models\User;
use App\Models\UserUnlock;
use Illuminate\Support\Facades\DB;

/**
 * Centralises what happens the moment an Admin approves a Payment:
 * the member is granted access to whatever they paid for.
 */
class PaymentApprovalService
{
    public function approve(Payment $payment, User $admin, ?string $note = null): Payment
    {
        return DB::transaction(function () use ($payment, $admin, $note) {
            $payment->update([
                'status' => 'approved',
                'approved_by' => $admin->id,
                'approved_at' => now(),
                'admin_note' => $note,
            ]);

            match ($payment->type) {
                'registration' => $this->grantRegistration($payment),
                'course' => $this->grantCourse($payment),
                'robot' => $this->grantRobot($payment),
                'signal_subscription' => $this->grantSignalSubscription($payment),
                'mentorship' => $this->confirmMentorship($payment),
                default => null,
            };

            return $payment->fresh();
        });
    }

    public function reject(Payment $payment, User $admin, ?string $note = null): Payment
    {
        $payment->update([
            'status' => 'rejected',
            'approved_by' => $admin->id,
            'approved_at' => now(),
            'admin_note' => $note,
        ]);

        return $payment->fresh();
    }

    protected function grantRegistration(Payment $payment): void
    {
        $payment->user->update([
            'registration_fee_paid' => true,
            'status' => 'approved',
            'approved_at' => now(),
        ]);
    }

    protected function grantCourse(Payment $payment): void
    {
        /** @var Course $course */
        $course = $payment->payable;

        UserUnlock::updateOrCreate(
            [
                'user_id' => $payment->user_id,
                'unlockable_type' => Course::class,
                'unlockable_id' => $course->id,
            ],
            ['payment_id' => $payment->id, 'expires_at' => null]
        );
    }

    protected function grantRobot(Payment $payment): void
    {
        /** @var Robot $robot */
        $robot = $payment->payable;
        $expires = now()->addDays($robot->duration_days);

        UserUnlock::updateOrCreate(
            [
                'user_id' => $payment->user_id,
                'unlockable_type' => Robot::class,
                'unlockable_id' => $robot->id,
            ],
            ['payment_id' => $payment->id, 'expires_at' => $expires]
        );

        RobotSubscription::create([
            'user_id' => $payment->user_id,
            'robot_id' => $robot->id,
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => $expires,
        ]);
    }

    protected function grantSignalSubscription(Payment $payment): void
    {
        SignalSubscription::create([
            'user_id' => $payment->user_id,
            'status' => 'active',
            'starts_at' => now(),
            'expires_at' => now()->addMonths(3),
        ]);
    }

    protected function confirmMentorship(Payment $payment): void
    {
        $payment->user->mentorshipBookings()
            ->where('mentorship_session_id', $payment->payable_id)
            ->where('status', 'pending')
            ->latest()
            ->first()
            ?->update(['status' => 'confirmed']);
    }
}
