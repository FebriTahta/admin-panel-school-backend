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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->string('alumni_name')->nullable();
            $table->string('alumni_image')->nullable();
            $table->string('alumni_telp')->nullable();
            $table->string('alumni_pekerjaan')->nullable();
            $table->string('alumni_alamatpekerjaan')->nullable();
            $table->string('alumni_tahunmasuk')->nullable();
            $table->string('alumni_tahunkeluar')->nullable();
            $table->string('alumni_status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
