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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_id', 100)->nullable()->default('-');
            $table->decimal('amount', 8, 2)->nullable()->default(0.00);
            $table->enum('status', ['approved', 'cancelled', 'waiting', 'finished', 'failed', 'processing'])->default('waiting');
            $table->longText('description')->nullable();

            $table->softDeletes();
            $table->timestamps();
            // foreign
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
