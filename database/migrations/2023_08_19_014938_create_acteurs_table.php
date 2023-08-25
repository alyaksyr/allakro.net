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
        Schema::create('acteurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->set('genre',['M', 'F']);
            $table->string('nationalite');
            $table->string('lieunais');
            $table->string('age');
            $table->string('contact')->uniqid();
            $table->string('address');
            $table->string('profession');
            $table->string('niveau');
            $table->boolean('resident')->default(1);
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
        Schema::dropIfExists('acteurs');
    }
};
