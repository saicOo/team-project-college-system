<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePublicQasTable extends Migration {

	public function up()
	{
		Schema::create('public_qas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('public_qa');
			$table->text('public_ans');
		});
	}

	public function down()
	{
		Schema::drop('public_qas');
	}
}