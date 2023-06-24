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
        Schema::create('transaksi1s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paymenttype_id');
            $table->longText('transaksi1_uuid')->nullable();
            $table->longText('transaksi1_name')->nullable();
            $table->longText('transaksi1_email')->nullable();
            $table->longText('transaksi1_alamat')->nullable();
            $table->longText('transaksi1_pos')->nullable();
            $table->longText('transaksi1_kota')->nullable();
            $table->longText('transaksi1_asal')->nullable();
            $table->longText('transaksi1_phone')->nullable();
            $table->longText('transaksi1_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi1s');
    }
};
