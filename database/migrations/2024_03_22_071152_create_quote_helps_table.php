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
        Schema::create('quote_helps', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('negotiator_id')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('offered_price')->nullable();
            $table->string('negotiator_tip')->nullable();
            $table->string('service_preference')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('quote_helps');
    }
};
