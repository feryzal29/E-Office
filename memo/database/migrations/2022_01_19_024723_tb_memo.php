<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbMemo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('tb_memo', function (Blueprint $table) {
        //     // $table->increments('id');
        //     // $table->string('no_surat',255);
        //     // $table->string('jenis',255);
        //     // $table->string('sifat',255);
        //     // $table->string('perihal',255);
        //     // $table->integer('nip_pengirim');
        //     // $table->string('tgl_surat',255);
        //     // $table->string('kepada',255);
        //     // $table->string('cc',255);
        //     // $table->text('isi',255);
        //     // $table->enum('status', ['belum', 'sudah'])->default('belum');
        //     // $table->timestamps();
        //     // $table->integer('mengetahui')->after('cc')->change();
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
