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
        Schema::create('tbl_siswapelanggaran', function (Blueprint $table) {
            $table->increments('idpelanggaran');
            $table->unsignedBigInteger('idsiswa');
            $table->unsignedBigInteger('id_jenispelanggaran');
            $table->text('keterangan')->nullable();
            $table->string('photobukti')->nullable();
            $table->date('tanggal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
