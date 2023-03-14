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
        if (!Schema::hasTable('profile_subtypes')) {
            Schema::create('profile_subtypes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('profile_id');
                $table->unsignedBigInteger('profile_sub_id')->comment("Nível do perfil (Jr, Sênior, etc..)");
                $table->string('name', 120);
                $table->longText('description');
                $table->longText('hide_description')->nullable()->comment("Descrição interna.");
                $table->integer('status')->default(1);
                $table->string('dashboard', 120);

                $table->softDeletes();
                $table->timestamps();

                $table->foreign('profile_id')->references('id')->on('profile_types')->onDelete('cascade');

                $table->comment("Tabela que registrará subprofiles (Ex: Investidor → Júnior).");
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
        Schema::dropIfExists('profile_subtypes');
    }
};
