<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlertMsgssTable extends Migration {

	public function up()
	{
		Schema::create('alert_msgss', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('msg_content');
			$table->integer('std_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('alert_msgss');
	}
}
