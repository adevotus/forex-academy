<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Robot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'version', 'image',
        'file_path', 'price', 'duration_days', 'published',
    ];

    protected function casts(): array
    {
        return ['published' => 'boolean'];
    }

    public function subscriptions()
    {
        return $this->hasMany(RobotSubscription::class);
    }

    public function isUnlockedFor(?User $user): bool
    {
        if (! $user) {
            return false;
        }

        return $user->hasUnlocked(self::class, $this->id);
    }

    public function priceFormatted(): string
    {
        return '$'.number_format($this->price, 2);
    }
}
