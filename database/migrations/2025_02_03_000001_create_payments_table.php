<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // What is being paid for.
            $table->enum('type', [
                'registration', 'course', 'robot', 'signal_subscription', 'mentorship',
            ]);

            // Polymorphic reference to the item purchased (Course, Robot, MentorshipSession).
            // Null for 'registration' and 'signal_subscription' (flat products).
            $table->string('payable_type')->nullable();
            $table->unsignedBigInteger('payable_id')->nullable();

            $table->unsignedInteger('amount'); // in cents
            $table->string('currency', 3)->default('USD');
            $table->string('reference')->nullable(); // e.g. mobile money / bank ref the member typed in
            $table->string('proof_path')->nullable(); // optional uploaded proof of payment

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('approved_at')->nullable();
            $table->text('admin_note')->nullable();

            $table->timestamps();

            $table->index(['payable_type', 'payable_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
