<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'role', 'content', 'rating',
        'media_path', 'media_type', 'is_active', 'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'rating'    => 'integer',
    ];

    // ── Scopes ────────────────────────────────────────────────────────────────

    public function scopeActive($q)
    {
        return $q->where('is_active', true);
    }

    public function scopeOrdered($q)
    {
        return $q->orderBy('order')->orderByDesc('created_at');
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    public function mediaUrl(): ?string
    {
        return $this->media_path ? asset('storage/' . $this->media_path) : null;
    }

    public function isVideo(): bool
    {
        return $this->media_type === 'video';
    }

    public function isImage(): bool
    {
        return $this->media_type === 'image';
    }

    /** Return the initials avatar letter */
    public function initial(): string
    {
        return strtoupper(mb_substr($this->name, 0, 1));
    }
}
