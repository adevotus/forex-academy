<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->string('pair'); // e.g. EUR/USD
            $table->enum('direction', ['buy', 'sell'])->default('buy');
            $table->decimal('entry_price', 12, 5)->nullable();
            $table->decimal('stop_loss', 12, 5)->nullable();
            $table->decimal('take_profit', 12, 5)->nullable();
            $table->text('explainer')->nullable(); // why this setup was chosen
            $table->enum('status', ['active', 'hit_tp', 'hit_sl', 'closed'])->default('active');
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signals');
    }
};
