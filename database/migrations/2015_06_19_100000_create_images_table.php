<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
      // Create photo table
      Schema::create('images', function($table) {
        $table->increments('id');

        $table->string('name')->default('');
        $table->string('alt')->deafult( '' );
        $table->string('path')->default('')->unique();

        $table->string('extension')->deafult( '' );
        $table->integer('size')->deafult( 0 );
        $table->string('mime_type')->deafult( '' );

        $table->integer('width')->deafult( 0 );
        $table->integer('height')->deafult( 0 );

        $table->integer('owner_id')
            ->unsigned()
            ->nullable()
            ->default( null )
            ->index();

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
      Schema::drop('images');
	}

}
