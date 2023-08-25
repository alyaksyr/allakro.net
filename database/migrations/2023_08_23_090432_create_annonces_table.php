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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Acteur::class)->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger('categorie_id');
            $table->unsignedSmallInteger('sous_categorie_id');
            $table->string('libelle');
            $table->string('detail');
            $table->string('photos');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('annonces');
    }
};
