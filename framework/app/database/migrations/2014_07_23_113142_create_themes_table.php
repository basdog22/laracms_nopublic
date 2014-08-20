<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('themes', function($table)
        {
            $table->increments('id');
            $table->string('theme_name',60)->unique();
            $table->string('theme_title',250);
            $table->text('icon_image');
            $table->string('version',10);
            $table->string('author',100);
            $table->string('url',255);
            $table->boolean('installed');
            $table->boolean('active');
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
        Schema::drop('themes');
	}

}
