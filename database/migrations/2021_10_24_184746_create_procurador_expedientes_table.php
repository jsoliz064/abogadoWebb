<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcuradorExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurador_expedientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_procurador')->nullable();
            $table->unsignedBigInteger('id_expediente');
            $table->foreign('id_procurador')->references('id')->on('procuradors')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_expediente')->references('id')->on('expedientes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('procurador_expedientes');
    }
}
