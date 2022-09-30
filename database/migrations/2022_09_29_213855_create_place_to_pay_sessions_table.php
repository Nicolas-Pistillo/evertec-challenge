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
        Schema::create('place_to_pay_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('request_id');
            $table->string('process_url', 150);
            $table->unsignedInteger('order_id');
            $table->dateTime('expiration');
            $table->string('status', 50)->nullable();
            $table->string('message', 150)->nullable();
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
        Schema::dropIfExists('place_to_pay_sessions');
    }
};
