<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epidemies', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('type')->nullable();
            $table->text('cause')->nullable();
            $table->text('foyer');
            $table->text('symptomes');
            $table->tinyInteger('nombre_cas')->nullable();
            $table->string('duree')->nullable();
            $table->date('datedebut');
            $table->date('datefin')->nullable();
            $table->tinyInteger('etat')->default(0);
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
        Schema::dropIfExists('epidemies');
    }
};
