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
        Schema::create('brosurs', function (Blueprint $table) {
            $table->id();
            $table->string('brosur_name')->nullable();
            $table->string('brosur_image')->nullable();
            $table->integer('brosur_highlight')->default(0)->nullable();
            $table->integer('brosur_download')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brosurs');
    }
};
