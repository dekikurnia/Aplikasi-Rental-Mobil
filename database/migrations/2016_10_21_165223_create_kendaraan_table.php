<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_plat', 20)->unique()->nullable(false);
            $table->string('tahun', 4);
            $table->decimal('tarif_perjam')->nullable(false);
            $table->string('status_rental', 20)->nullable(false);
            $table->uuid('id_merk');
            $table->timestamps();

            $table->foreign('id_merk')->references('id')->on('merk')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
