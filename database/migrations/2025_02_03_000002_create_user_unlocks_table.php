<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Generic record of "this member can access this piece of content",
        // created automatically once the related Payment is approved by the Admin.
        Schema::create('user_unlocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('unlockable_type'); // App\Models\Course, App\Models\Robot, etc.
            $table->unsignedBigInteger('unlockable_id');
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'unlockable_type', 'unlockable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_unlocks');
    }
};
