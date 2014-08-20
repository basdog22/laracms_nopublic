<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuitemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('menuitems', function($table)
        {
            $table->increments('id');
            $table->integer('menus_id');
            $table->string('model');
            $table->integer('sort')->index();
            $table->string('url',250);
            $table->string('link_text',250);
            $table->string('link_target',20);
            $table->text('link_attr');
            $table->text('link_css');
            $table->string('link_class');
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
        Schema::drop('menuitems');
    }

}
