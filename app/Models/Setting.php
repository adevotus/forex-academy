<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $timestamps  = false;
    public $primaryKey  = 'key';
    public $keyType     = 'string';
    public $incrementing = false;

    protected $fillable = ['key', 'value'];

    // ── Helpers ───────────────────────────────────────────
    public static function get(string $key, mixed $default = null): mixed
    {
        $row = static::find($key);
        return $row ? $row->value : $default;
    }

    public static function set(string $key, mixed $value): void
    {
        static::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
