<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrivateQasTable extends Migration {

	public function up()
	{
		Schema::create('private_qas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('private_q')->nullable();
			$table->text('private_ans');
			$table->integer('std_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('private_qas');
	}
}
