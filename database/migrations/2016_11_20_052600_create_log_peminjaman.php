<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogPeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_peminjaman', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_kendaraan')->index();
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->uuid('id_pelanggan')->index();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('dikembalikan')->default(false);
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
        Schema::dropIfExists('log_peminjaman');
    }
}
