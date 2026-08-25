<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'level', 'thumbnail',
        'price', 'is_free', 'published', 'order',
    ];

    protected function casts(): array
    {
        return [
            'is_free' => 'boolean',
            'published' => 'boolean',
        ];
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    public function cheatSheets()
    {
        return $this->hasMany(CheatSheet::class);
    }

    public function isUnlockedFor(?User $user): bool
    {
        if (! $user) {
            return false;
        }

        if ($this->is_free) {
            return true;
        }

        return $user->hasUnlocked(self::class, $this->id);
    }

    public function levelLabel(): string
    {
        return ucfirst($this->level);
    }

    public function priceFormatted(): string
    {
        return $this->is_free ? 'Free' : '$'.number_format($this->price, 2);
    }
}
