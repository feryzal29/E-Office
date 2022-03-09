<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('tb_user', function (Blueprint $table) {
        //     // $table->bigIncrements('id_user',255);
        //     // $table->string('nip',255);
        //     // $table->string('Nama',255);
        //     // $table->string('username',255);
        //     // $table->string('password',255);
        //     // $table->string('jk',255);
        //     // $table->string('level',255);
        //     // $table->string('jabatan_id',255);
        //     // // $table->foreign('jabatan_id')
        //     // //         ->references('id')->on('tb_jabatan')
        //     // //         ->onDelete('set null')
        //     // //         ->onUpdate('cascade');
        //     // $table->timestamps();
           
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
