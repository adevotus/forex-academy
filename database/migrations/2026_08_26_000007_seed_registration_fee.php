<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Ensure registration_fee is set to 300.00 in the settings table.
 *
 * This corrects the default that shipped as 50.00 and ensures any
 * existing row (or no row at all) reflects the correct $300 fee.
 */
return new class extends Migration
{
    public function up(): void
    {
        DB::table('settings')->updateOrInsert(
            ['key' => 'registration_fee'],
            ['value' => '300.00']
        );
    }

    public function down(): void
    {
        DB::table('settings')->where('key', 'registration_fee')
            ->update(['value' => '50.00']);
    }
};
