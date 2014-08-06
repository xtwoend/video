<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('video_informations', function($table)
        {
        	$table->increments('id');
        	$table->integer('video_id')->index();
           	$table->string('name');
           	$table->text('description');
           	$table->integer('license_id');
           	$table->integer('category_id');
           	$table->string('language');
           	$table->string('comment')->default('no');
           	$table->string('publish')->default('publish');
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
		Schema::drop('video_informations');
	}

}
