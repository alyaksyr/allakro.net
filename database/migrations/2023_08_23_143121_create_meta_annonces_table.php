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
        Schema::create('meta_annonces', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Annonce::class)->constrained()->cascadeOnDelete();
            $table->string('type')->default('null');
            $table->string('key')->index();
            $table->string('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_annonces');
    }
};
