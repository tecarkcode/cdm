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
        if (!Schema::hasTable('profile_types')) {
            Schema::create('profile_types', function (Blueprint $table) {
                $table->id();
                $table->string('name', 120);
                $table->longText('description');
                $table->tinyInteger('has_subtype')->default(0)->comment("0=Não/1=Sim → Se há subcategoria o dashboard será encontrado na profile_subtypes.");
                $table->string('dashboard', 120)->nullable();
                $table->integer('status')->default(1);

                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_types');
    }
};
