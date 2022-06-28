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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('desc')->nullable();
            $table->string('img')->nullable();
            $table->string('price')->nullable();
            $table->string('model_number')->nullable();
            $table->text('speed')->nullable();
            $table->text('kilos')->nullable();
            $table->text('fual_tank')->nullable();
            $table->bigInteger('seats')->nullable();

            $table->enum('is_automatic',['automatic','manual'])->default('automatic')->nullable();
            $table->enum('type',['used','new'])->default('new')->nullable();

            $table->text('engin')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');



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
        Schema::dropIfExists('cars');
    }
};
