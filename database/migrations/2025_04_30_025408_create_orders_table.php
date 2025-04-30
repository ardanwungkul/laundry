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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('pelanggan_id')->nullable();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onUpdate('cascade')->onDelete('set null');
            $table->string('nama_pegawai');
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->time('order');
            $table->time('delive');
            $table->string('status_proses');
            $table->enum('status_pembayaran', ['belum_bayar', 'cash', 'transfer'])->default('belum_bayar');
            $table->string('keterangan')->nullable();
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
