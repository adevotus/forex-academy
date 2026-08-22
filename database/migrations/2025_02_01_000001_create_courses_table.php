<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('level', ['starter', 'intermediate', 'advanced', 'pro'])->default('starter');
            $table->string('thumbnail')->nullable();
            $table->unsignedInteger('price')->default(0); // in cents; 0 = free/included in registration
            $table->boolean('is_free')->default(false);
            $table->boolean('published')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
