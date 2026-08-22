<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('robots', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('version')->default('1.0');
            $table->string('image')->nullable();
            $table->string('file_path')->nullable(); // downloadable EA file, admin-uploaded
            $table->unsignedInteger('price'); // in cents
            $table->unsignedInteger('duration_days')->default(90); // subscription length once unlocked
            $table->boolean('published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('robots');
    }
};
