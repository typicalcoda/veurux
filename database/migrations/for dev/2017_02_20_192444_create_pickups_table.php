<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('pickups', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('client_id');
        $table->integer('doctor_id');
        $table->boolean('repeat');
        $table->integer('no_items');
        $table->string('originator');
        $table->datetime('collection_date');
        $table->text('instructions');
        $table->boolean('status');
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
        Schema::dropIfExists('pickups');

   }
}
