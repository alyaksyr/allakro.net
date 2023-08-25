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
        Schema::create('pharmacie_gardes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Pharmacie::class)->constrained()->cascadeOnDelete();
            $table->string('responsable');
            $table->date('debut');
            $table->date('fini');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('pharmacie_gardes',function(Blueprint $table){
            $table->removeColumn('pharmacie_id');
        });
    }
};
