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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('negotiator_id')->nullable();
            $table->string('title')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('quoted_price')->nullable();
            $table->string('asking_price')->nullable();
            $table->string('offering_percentage')->nullable();
            $table->string('service_preference')->nullable();
            $table->text('notes')->nullable();
            $table->string('type')->nullable();
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
        Schema::dropIfExists('quotes');
    }
};
