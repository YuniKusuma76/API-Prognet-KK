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
        Schema::create('anggotakk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kk_id');
            $table->foreign('kk_id')->references('id')->on('kk');
            $table->unsignedBigInteger('penduduk_id');
            $table->foreign('penduduk_id')->references('id')->on('penduduk');
            $table->unsignedBigInteger('hubungankk_id');
            $table->foreign('hubungankk_id')->references('id')->on('hubungankk');
            $table->enum('statusaktif', ['Aktif', 'Tidak Aktif']);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotakk');
    }
};
