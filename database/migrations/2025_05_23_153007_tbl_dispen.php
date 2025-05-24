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
        Schema::create('tbl_dispen', function (Blueprint $table) {
            $table->increments('iddispen');
            $table->string('namadispen');
            $table->dateTime('waktumulai');
            $table->dateTime('waktuselesai');
            $table->unsignedBigInteger('idguru');
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
