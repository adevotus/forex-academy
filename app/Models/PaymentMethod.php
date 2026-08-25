<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name', 'subtitle', 'type', 'icon_color', 'details', 'note', 'is_active', 'order',
    ];

    protected $casts = [
        'details'   => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order')->orderBy('id');
    }

    public function iconColorClasses(): string
    {
        return match ($this->icon_color) {
            'emerald' => 'bg-emerald-100 text-emerald-700',
            'blue'    => 'bg-blue-100 text-blue-700',
            'gold'    => 'bg-yellow-100 text-yellow-700',
            'purple'  => 'bg-purple-100 text-purple-700',
            default   => 'bg-slate-100 text-slate-700',
        };
    }

    public function typeLabel(): string
    {
        return match ($this->type) {
            'mobile_money'   => 'Mobile Money',
            'bank_transfer'  => 'Bank Transfer',
            'crypto'         => 'Cryptocurrency',
            'paypal'         => 'PayPal',
            default          => 'Other',
        };
    }

    public function typeIcon(): string
    {
        return match ($this->type) {
            'mobile_money'  => 'M',
            'bank_transfer' => 'B',
            'crypto'        => '₿',
            'paypal'        => 'P',
            default         => '#',
        };
    }
}
