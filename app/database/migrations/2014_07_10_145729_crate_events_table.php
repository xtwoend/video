<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->datetime('start_date');
            $table->datetime('end_date'); 
            $table->string('cover');
            $table->string('privacy');
            $table->integer('owner_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
