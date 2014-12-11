<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
            
            Schema::create('address', function(Blueprint $table)
		{
			$table->increments('id');
                        
                        $table->integer('addressable_id')->unsigned();
			$table->string('addressable_type');
                        $table->string('city', 50);
                        $table->string('zip', 50);
			$table->string('address', 100);
                        $table->timestamps();
		});
             
             
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
            Schema::drop('address');
	}

}
