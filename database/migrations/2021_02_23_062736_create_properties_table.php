<?php

use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default(Property::AVAILABLE_PROPERTY);
            $table->string('price');
            $table->integer('number_of_bedrooms')->unsigned();
            $table->integer('number_of_bathrooms')->unsigned();
            $table->longText('description');
            $table->integer('square_feet');
            $table->string('house_type');
            $table->bigInteger('landlord_id')->unsigned();
            $table->string('images');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('landlord_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
