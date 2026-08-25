<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'type', 'payable_type', 'payable_id', 'amount', 'currency',
        'reference', 'proof_path', 'status', 'approved_by', 'approved_at', 'admin_note',
    ];

    protected function casts(): array
    {
        return ['approved_at' => 'datetime'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    public function amountFormatted(): string
    {
        $currency = Setting::get('currency', 'USD');
        $symbol   = $currency === 'TZS' ? 'TZS ' : '$';
        return $symbol . number_format($this->amount / 100, 2);
    }

    public function currencySymbol(): string
    {
        $currency = Setting::get('currency', 'USD');
        return $currency === 'TZS' ? 'TZS ' : '$';
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'registration' => 'Registration Fee',
            'course' => 'Course Unlock',
            'robot' => 'Robot / EA Subscription',
            'signal_subscription' => 'Signal Subscription (3 months)',
            'mentorship' => 'Mentorship Booking',
            default => ucfirst($this->type),
        };
    }
}
