<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');                          // e.g. "M-Pesa"
            $table->string('subtitle')->nullable();          // e.g. "Mobile Money Transfer"
            $table->string('type')->default('other');        // mobile_money | bank_transfer | crypto | paypal | other
            $table->string('icon_color')->default('emerald');// emerald | blue | gold | purple | slate
            $table->json('details')->nullable();             // [{label: "Phone", value: "+255 712 345 678"}, ...]
            $table->text('note')->nullable();                // shown as small note below cards
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
