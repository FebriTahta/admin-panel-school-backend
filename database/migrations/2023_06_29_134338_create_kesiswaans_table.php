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
        Schema::create('kesiswaans', function (Blueprint $table) {
            $table->id();
            $table->string('kesiswaan_title')->nullable();
            $table->string('kesiswaan_slug')->nullable();
            $table->string('kesiswaan_image')->nullable();
            $table->longText('kesiswaan_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesiswaans');
    }
};
