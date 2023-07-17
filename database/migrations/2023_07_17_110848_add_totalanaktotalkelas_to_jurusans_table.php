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
        Schema::table('jurusans', function (Blueprint $table) {
            $table->integer('jurusan_anak')->default(0)->nullable();
            $table->integer('jurusan_kelas')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jurusans', function (Blueprint $table) {
            $table->integer('jurusan_anak');
            $table->integer('jurusan_kelas');
        });
    }
};
