<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('link');
            $table->decimal('price', $precision = 17, $scale = 2);
            $table->decimal('old_price', $precision = 17, $scale = 2);
            $table->bigInteger('created_by')->default(0);
            $table->bigInteger('category_id')->nullable()->default(0);
            $table->integer('lessons')->nullable()->default(0);
            $table->integer('view_count')->nullable()->default(0);
            $table->json('benefits')->nullable();
            $table->json('fqa')->nullable()->default(null);
            $table->tinyInteger('is_feature');
            $table->tinyInteger('is_online');
            $table->text('description');
            $table->longText('content');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
