<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateParticipantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participants', function($table)
        {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('cover');
            $table->string('privacy');
            $table->integer('event_id');
            $table->integer('video_id');
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
		Schema::drop('participants');
	}

}
