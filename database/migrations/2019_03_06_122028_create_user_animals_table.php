<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_animals', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('animal_id');
            $table->unsignedInteger('user_id');
            $table->string('name', 64)->nullable();
            $table->timestamps();

            $table->foreign('animal_id')->references('id')->on('animals');
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
        Schema::table('user_animals', function (Blueprint $table) {
            $table->dropForeign('user_animals_animal_id_foreign');
            $table->dropForeign('user_animals_user_id_foreign');
        });

        Schema::dropIfExists('user_animals');
    }
}
