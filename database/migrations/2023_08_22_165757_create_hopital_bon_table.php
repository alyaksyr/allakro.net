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
        Schema::create('hopital_bon', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Bon::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(\App\Models\Hopital::class)->constrained()->cascadeOnDelete();
            $table->primary(['bon_id', 'hopital_id', ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hopital_bon');
    }
};
