<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenawaranHargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawaran_harga', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('pabrikan');
            $table->string('unit');
            $table->string('satuan');
            $table->string('harga_beli');
            $table->string('harga_beli_satuan');
            $table->string('keuntungan');
            $table->string('harga_jual_satuan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penawaran_harga');
    }
}
