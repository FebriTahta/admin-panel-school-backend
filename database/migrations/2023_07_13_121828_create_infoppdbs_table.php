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
        Schema::create('infoppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('infoppdb_title')->nullable();
            $table->string('infoppdb_slug')->nullable();
            $table->string('infoppdb_image')->nullable();
            $table->string('infoppdb_desc')->nullable();
            $table->integer('infoppdb_view')->default(0);
            $table->string('infoppdb_yearone')->nullable();
            $table->string('infoppdb_yeartwo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infoppdbs');
    }
};
