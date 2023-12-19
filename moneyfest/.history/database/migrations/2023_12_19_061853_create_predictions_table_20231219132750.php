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
            $table->string('iklan');
            $table->string('penjualan_produk');
            $table->string('royalti');
            $table->string('lisensi');
            $table->string('donasi');
            $table->string('langganan');
            $table->string('afiliasi');
            $table->string('layanan_konsultasi');
            $table->string('penjualan_aset');
            $table->string('lain_lain');
            $table->string('prediction');
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
