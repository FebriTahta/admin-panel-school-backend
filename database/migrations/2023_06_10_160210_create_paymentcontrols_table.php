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
        Schema::create('paymentcontrols', function (Blueprint $table) {
            $table->id();
            $table->string('paymentcontrol_name')->nullable();
            $table->longText('paymentcontrol_merchant_id')->nullable();
            $table->longText('paymentcontrol_server_key')->nullable();
            $table->longText('paymentcontrol_client_key')->nullable();
            $table->string('paymentcontrol_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentcontrols');
    }
};
