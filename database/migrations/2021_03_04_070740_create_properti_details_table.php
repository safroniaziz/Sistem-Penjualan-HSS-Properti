<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properti_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('properti_id')->constrained('propertis');
            $table->string('no_kavling');
            $table->string('harga');
            $table->string('panjang');
            $table->string('lebar');
            $table->string('luas');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('properti_details');
    }
}
