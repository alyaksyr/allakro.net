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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Acteur::class)->constrained()->cascadeOnDelete();
            $table->string('secteur');
            $table->set('domaine', ['Commerciale', 'Artisanale', 'Agricole', 'Libérale']);
            $table->string('libelle');
            $table->longText('description');
            $table->string('contact');
            $table->string('address');
            $table->string('email');
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
        Schema::dropIfExists('activites', function(Blueprint $table){
            $table->removeColumn('acteur_id');
        });

    }
};
