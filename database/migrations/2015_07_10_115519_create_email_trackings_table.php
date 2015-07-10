<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('email_trackings', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('email_id')->unsigned();
			$table->string('ip',45);
			$table->string('host')->nullable();
			$table->string('user_agent')->nullable();
			$table->string('country')->nullable();
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
		Schema::drop('email_trackings');
    }
}
