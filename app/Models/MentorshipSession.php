<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorshipSession extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'mentor_name', 'type', 'price', 'published'];

    protected function casts(): array
    {
        return ['published' => 'boolean'];
    }

    public function bookings()
    {
        return $this->hasMany(MentorshipBooking::class);
    }

    public function priceFormatted(): string
    {
        return '$'.number_format($this->price / 100, 2);
    }
}
