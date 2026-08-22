<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RobotSubscription extends Model
{
    protected $fillable = ['user_id', 'robot_id', 'status', 'starts_at', 'expires_at'];

    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'expires_at' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function robot()
    {
        return $this->belongsTo(Robot::class);
    }
}
