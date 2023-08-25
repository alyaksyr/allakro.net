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
        Schema::create('pharmacie_bon', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Bon::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Pharmacie::class)->constrained()->cascadeOnDelete();
            $table->primary(['bon_id', 'pharmacie_id', ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pharmacie_bon');
    }
};
