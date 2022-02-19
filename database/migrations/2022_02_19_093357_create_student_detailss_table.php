<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentDetailssTable extends Migration {

	public function up()
	{
		Schema::create('student_detailss', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('phone', 11);
			$table->text('address');
			$table->decimal('degree', 5,2);
			$table->text('img');
			$table->boolean('partial_payment_status')->default(0);
			$table->boolean('full_payment_status')->default(0);
			$table->integer('dept_id')->unsigned()->nullable();
			$table->integer('std_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('student_detailss');
	}
}
