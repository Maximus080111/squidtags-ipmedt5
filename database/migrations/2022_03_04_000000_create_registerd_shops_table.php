<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterdShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registerd_shops', function (Blueprint $table) {
            $table->id();
            $table->string('StoreName');
            $table->string('Adress')->nullable();
            $table->string('MaxVisit')->nullable();
            $table->string('AverageTime')->nullable();
            $table->longText('ImgLink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registerd_shops');
    }
}
