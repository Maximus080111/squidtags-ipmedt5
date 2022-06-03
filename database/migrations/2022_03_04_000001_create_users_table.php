<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->default('test');
            $table->string('lname')->default('test');
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique()->default('test1234');
            $table->string('password');
            $table->boolean('isAdmin')->default(false);
            $table->string('storeOwner')->nullable();
            $table->integer('visitCount')->default(0);
            $table->unsignedBigInteger('lastStoreID')->default(1);
            $table->foreign('lastStoreID')->references('id')->on('registerd_shops');
            $table->string('profilePicture')->default('https://cdn.discordapp.com/attachments/943470941269295106/963797136527474749/unknown-removebg-preview.png');;
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
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
}
