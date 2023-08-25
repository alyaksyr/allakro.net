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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Acteur::class)->constrained()->cascadeOnDelete();
            $table->string('secteur');
            $table->string('domaine');
            $table->string('libelle');
            $table->longText('description');
            $table->string('photo');
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
        Schema::dropIfExists('competences',function(Blueprint $table){
            $table->removeColumn('acteur_id');
        });
    }
};
