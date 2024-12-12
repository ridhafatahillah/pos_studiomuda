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
        Schema::create('datapelanggan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('FNAME');
            $table->string('ORG');
            $table->string('Q4');
            $table->string('TLP');
            $table->string('startsAt');
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
