<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentDesiresTable extends Migration {

	public function up()
	{
		Schema::create('student_desires', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('desire_1_id')->unsigned();
			$table->integer('desire_2_id')->unsigned()->nullable();
			$table->integer('desire_3_id')->unsigned();
			$table->integer('std_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('student_desires');
	}
}
