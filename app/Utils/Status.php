<?php
namespace App\Utils;
class Status
{
    // Student / member status
    public const ACTIVE = 'active';
    public const INACTIVE = 'inactive';
    public const SUSPENDED = 'suspended';
    public const GRADUATED = 'graduated';
    public const DROPPED_OUT = 'dropped_out';

    // Enrollment / application status
    public const PENDING = 'pending';
    public const APPROVED = 'approved';
    public const REJECTED = 'rejected';
    public const WAITLISTED = 'waitlisted';

    // Payment status
    public const PAID = 'paid';
    public const UNPAID = 'unpaid';
    public const PARTIALLY_PAID = 'partially_paid';
    public const OVERDUE = 'overdue';

    /**
     * All member/student statuses
     */
    public static function memberStatuses(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
            self::SUSPENDED,
            self::GRADUATED,
            self::DROPPED_OUT,
        ];
    }

    /**
     * All enrollment statuses
     */
    public static function enrollmentStatuses(): array
    {
        return [
            self::PENDING,
            self::APPROVED,
            self::REJECTED,
            self::WAITLISTED,
        ];
    }

    /**
     * All payment statuses
     */
    public static function paymentStatuses(): array
    {
        return [
            self::PAID,
            self::UNPAID,
            self::PARTIALLY_PAID,
            self::OVERDUE,
        ];
    }

    /**
     * Human-readable label for a status value
     */
    public static function label(string $status): string
    {
        return ucwords(str_replace('_', ' ', $status));
    }

    /**
     * Check if a value is a valid status in a given group
     */
    public static function isValid(string $status, array $group): bool
    {
        return in_array($status, $group, true);
    }
}