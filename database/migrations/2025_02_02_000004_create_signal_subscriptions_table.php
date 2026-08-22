<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('signal_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('status', ['active', 'expired', 'revoked'])->default('active');
            $table->timestamp('starts_at')->useCurrent();
            $table->timestamp('expires_at')->nullable(); // typically starts_at + 3 months
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signal_subscriptions');
    }
};
