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
        Schema::create('naissances', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Declaration::class)->constrained()->cascadeOnDelete();
            $table->string('nom');
            $table->set('genre',['M', 'F']);
            $table->date('datenais');
            $table->string('lieunais');
            $table->string('pere');
            $table->string('mere');
            $table->string('contact');
            $table->string('address');
            $table->string('mode');
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
        Schema::dropIfExists('naissances');
    }
};
