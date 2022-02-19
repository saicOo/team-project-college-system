<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('student_detailss', function(Blueprint $table) {
			$table->foreign('dept_id')->references('id')->on('departments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->foreign('desire_1_id')->references('id')->on('departments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->foreign('desire_2_id')->references('id')->on('departments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->foreign('desire_3_id')->references('id')->on('departments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->foreign('std_id')->references('id')->on('student_detailss')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('alert_msgss', function(Blueprint $table) {
			$table->foreign('std_id')->references('id')->on('student_detailss')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('private_qas', function(Blueprint $table) {
			$table->foreign('std_id')->references('id')->on('student_detailss')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('student_detailss', function(Blueprint $table) {
			$table->dropForeign('student_detailss_dept_id_foreign');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->dropForeign('student_desires_desire_1_id_foreign');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->dropForeign('student_desires_desire_2_id_foreign');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->dropForeign('student_desires_desire_3_id_foreign');
		});
		Schema::table('student_desires', function(Blueprint $table) {
			$table->dropForeign('student_desires_std_id_foreign');
		});
		Schema::table('alert_msgss', function(Blueprint $table) {
			$table->dropForeign('alert_msgss_std_id_foreign');
		});
		Schema::table('private_qas', function(Blueprint $table) {
			$table->dropForeign('private_qas_std_id_foreign');
		});
	}
}