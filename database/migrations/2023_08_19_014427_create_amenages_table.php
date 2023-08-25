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
        Schema::create('amenages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Declaration::class)->constrained()->cascadeOnDelete();
            $table->string('nom');
            $table->set('genre',['M', 'F']);
            $table->date('datenais');
            $table->date('datearrive');
            $table->string('contact');
            $table->text('address');
            $table->string('profession');
            $table->string('provenance');
            $table->set('mode',[1, 2]);
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
        Schema::dropIfExists('amenages');
    }
};
