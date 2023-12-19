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
        Schema::create('predictions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('iklan');
            $table->unsignedBigInteger('penjualan_produk');
            $table->unsignedBigInteger('royalti');
            $table->unsignedBigInteger('lisensi');
            $table->unsignedBigInteger('donasi');
            $table->unsignedBigInteger('langganan');
            $table->unsignedBigInteger('afiliasi');
            $table->unsignedBigInteger('layanan_konsultasi');
            $table->unsignedBigInteger('penjualan_aset');
            $table->unsignedBigInteger('lain_lain');
            $table->unsignedBigInteger('prediction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('predictions');
    }
};
