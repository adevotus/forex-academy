<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [
        'pair', 'direction', 'entry_price', 'stop_loss', 'take_profit',
        'explainer', 'status', 'published_at',
    ];

    protected function casts(): array
    {
        return ['published_at' => 'datetime'];
    }

    public function isUnlockedFor(?User $user): bool
    {
        return $user && $user->hasActiveSignalSubscription();
    }
}
