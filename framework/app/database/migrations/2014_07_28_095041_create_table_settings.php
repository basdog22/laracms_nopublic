<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSettings extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('settings', function($table)
        {
            $table->increments('id');
            $table->string('area',50)->index();
            $table->string('section',150)->index();
            $table->string('setting_name',120)->index();
            $table->text('setting_value');
            $table->boolean('autoload')->index();
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
        Schema::drop('settings');
    }

}
