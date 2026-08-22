<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'status',
        'phone', 'country', 'avatar', 'registration_fee_paid', 'approved_at',
        'preferences',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at'     => 'datetime',
            'approved_at'           => 'datetime',
            'registration_fee_paid' => 'boolean',
            'password'              => 'hashed',
            'preferences'           => 'array',
        ];
    }

    /** Convenience: read a single preference key with optional default. */
    public function pref(string $key, mixed $default = null): mixed
    {
        return ($this->preferences ?? [])[$key] ?? $default;
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function unlocks()
    {
        return $this->hasMany(UserUnlock::class);
    }

    public function lessonProgress()
    {
        return $this->hasMany(LessonProgress::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')->withPivot('earned_at');
    }

    public function robotSubscriptions()
    {
        return $this->hasMany(RobotSubscription::class);
    }

    public function signalSubscription()
    {
        return $this->hasMany(SignalSubscription::class);
    }

    public function mentorshipBookings()
    {
        return $this->hasMany(MentorshipBooking::class);
    }

    public function hasActiveSignalSubscription(): bool
    {
        return $this->signalSubscription()
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->exists();
    }

    public function hasUnlocked(string $type, int $id): bool
    {
        return $this->unlocks()
            ->where('unlockable_type', $type)
            ->where('unlockable_id', $id)
            ->where(function ($q) {
                $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
            })
            ->exists();
    }
}
