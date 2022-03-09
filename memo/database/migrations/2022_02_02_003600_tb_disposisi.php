<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbDisposisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('tb_disposisi', function (Blueprint $table) {
        //         $table->increments('id_disposisi');
        //         $table->string('no_surat',255);
        //         $table->string('sifat',255);
        //         $table->string('perihal',255);
        //         $table->integer('nip_pengirim');
        //         $table->string('jabatan',255);
        //         $table->string('tgl_surat',255);
        //         $table->string('kepada',255);
        //         $table->string('pengirim_disposisi',255);
        //         $table->text('isi',255);
        //         $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
