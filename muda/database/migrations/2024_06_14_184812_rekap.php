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
        Schema::create('rekap', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('haritanggal');
            $table->string('jam');
            $table->string('paket');
            $table->string('tambahan_orang');
            $table->string('tambahan_foto');
            $table->string('tambahan_waktu');
            $table->string('harga');
            $table->string('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
