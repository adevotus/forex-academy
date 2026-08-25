<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message', 'status', 'ip_address'];

    public function scopeUnread($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeLatest($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function isNew(): bool
    {
        return $this->status === 'new';
    }

    public function markRead(): void
    {
        if ($this->status === 'new') {
            $this->update(['status' => 'read']);
        }
    }
}
