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
        Schema::create('decedes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Declaration::class)->constrained()->cascadeOnDelete();
            $table->string('nom');
            $table->set('genre',['M', 'F']);
            $table->date('datenais');
            $table->date('datedeces');
            $table->string('profession');
            $table->string('lieu');
            $table->string('motif');
            $table->string('referant');
            $table->string('contact');
            $table->text('address');
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
        Schema::dropIfExists('decedes');
    }
};
