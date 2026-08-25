<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Add missing media columns to the courses table:
 *  - cover_image      : path to the uploaded course cover image
 *  - promo_video_path : path to the uploaded promo video (replaces promo_video_url)
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            if (! Schema::hasColumn('courses', 'cover_image')) {
                $table->string('cover_image')->nullable()->after('thumbnail');
            }
            if (! Schema::hasColumn('courses', 'promo_video_path')) {
                $table->string('promo_video_path')->nullable()->after('cover_image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $cols = [];
            if (Schema::hasColumn('courses', 'cover_image'))      $cols[] = 'cover_image';
            if (Schema::hasColumn('courses', 'promo_video_path')) $cols[] = 'promo_video_path';
            if ($cols) $table->dropColumn($cols);
        });
    }
};
