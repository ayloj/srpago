<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCpMexTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cp_mex', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('d_codigo', 8)->nullable();
			$table->string('d_asenta', 90)->nullable();
			$table->string('d_tipo_asenta', 40)->nullable();
			$table->string('D_mnpio', 50)->nullable();
			$table->string('d_estado', 40)->nullable();
			$table->string('d_ciudad', 50)->nullable();
			$table->string('d_CP', 8)->nullable();
			$table->string('c_estado', 2)->nullable();
			$table->string('c_oficina', 8)->nullable();
			$table->string('c_CP', 8)->nullable();
			$table->string('c_tipo_asenta', 2)->nullable();
			$table->string('c_mnpio', 3)->nullable();
			$table->string('id_asenta_cpcons', 5)->nullable();
			$table->string('d_zona', 40)->nullable();
			$table->string('c_cve_ciudad', 3)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cp_mex');
	}

}
