<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
        });

        // Seed defaults
        DB::table('settings')->insert([
            ['key' => 'registration_fee',  'value' => '50.00'],
            ['key' => 'signal_price',      'value' => '150.00'],
            ['key' => 'currency',          'value' => 'USD'],
            ['key' => 'usd_to_tzs',        'value' => '2600'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
