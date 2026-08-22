<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorshipBooking extends Model
{
    protected $fillable = ['user_id', 'mentorship_session_id', 'preferred_at', 'status'];

    protected function casts(): array
    {
        return ['preferred_at' => 'datetime'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function session()
    {
        return $this->belongsTo(MentorshipSession::class, 'mentorship_session_id');
    }
}
