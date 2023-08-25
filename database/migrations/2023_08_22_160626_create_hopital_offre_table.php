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
        Schema::create('hopital_offre', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Offre::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Hopital::class)->constrained()->cascadeOnDelete();
            $table->primary(['offre_id', 'hopital_id', ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offre_hopital');
    }
};
