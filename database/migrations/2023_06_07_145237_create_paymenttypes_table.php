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
        Schema::create('paymenttypes', function (Blueprint $table) {
            $table->id();
            $table->string('payment_name');
            $table->longText('payment_desc');
            $table->string('payment_value');
            $table->string('payment_status');
            $table->longText('payment_image')->nullable();
            $table->longText('payment_thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymenttypes');
    }
};
