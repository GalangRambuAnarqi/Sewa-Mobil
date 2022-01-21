<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('mobil_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('tanggal_pinjam')->nullable();
            $table->string('tanggal_kembali')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status')->default('Proses Peminjaman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
