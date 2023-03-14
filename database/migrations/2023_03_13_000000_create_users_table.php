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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('profile_id');
                $table->unsignedBigInteger('profile_sub_id')->nullable()->comment("Se houver, será a subcategoria do perfil.");
                $table->string('name', 120);
                $table->string('cpf', 50)->nullable();
                $table->string('cnpj', 50)->nullable();
                $table->string('email', 120)->unique();
                $table->string('phone', 20)->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('profile_id')->references('id')->on('profile_types')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
};
