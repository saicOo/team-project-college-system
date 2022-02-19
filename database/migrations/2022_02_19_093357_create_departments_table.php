<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentsTable extends Migration {

	public function up()
	{
		Schema::create('departments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('dept_name');
			$table->integer('dept_capacity_num');
			$table->decimal('price', 8,2);
			$table->decimal('minimum_degree', 5,2);
		});
	}

	public function down()
	{
		Schema::drop('departments');
	}
}