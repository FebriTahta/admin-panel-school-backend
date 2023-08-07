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
        Schema::create('floatmenus', function (Blueprint $table) {
            $table->id();
            $table->string('floatmenus_name')->nullable();
            $table->string('floatmenus_link')->nullable();
            $table->string('floatmenus_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floatmenus');
    }
};
