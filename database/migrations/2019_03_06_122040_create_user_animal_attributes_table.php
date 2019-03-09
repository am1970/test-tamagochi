<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnimalAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_animal_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_animal_id');
            $table->unsignedMediumInteger('attribute_id');
            $table->unsignedInteger('value')->default(config('game.max_attribute_value'));
            $table->timestamps();

            $table->foreign('user_animal_id')->references('id')->on('user_animals');
            $table->foreign('attribute_id')->references('id')->on('attributes');
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_animal_attributes', function (Blueprint $table) {
            $table->dropForeign('user_animal_attributes_user_animal_id_foreign');
            $table->dropForeign('user_animal_attributes_attribute_id_foreign');
        });

        Schema::dropIfExists('user_animal_attributes');
    }
}
