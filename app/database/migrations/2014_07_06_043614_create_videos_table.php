<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the uploads table
        Schema::create('videos', function($table)
        {
            $table->increments('id');
            $table->string('code')->unique()->index();
            $table->string('playback');
            $table->string('cover');
            $table->string('filename');
            $table->string('path');
            $table->string('extension');
            $table->string('mimetype');
            $table->integer('size');
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
		Schema::drop('videos');
	}

}
