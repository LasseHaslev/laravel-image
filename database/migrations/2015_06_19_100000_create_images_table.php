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

        $table->string('original_name')->default('');
        $table->string('alt')->default( '' );
        $table->string('path')->default('')->unique();

        $table->string('extension')->default( '' );
        $table->integer('size')->default( 0 );
        $table->string('mime_type')->default( '' );

        $table->integer('width')->default( 0 );
        $table->integer('height')->default( 0 );

        $table->integer('owner_id')
            ->unsigned()
            ->nullable()
            ->default( null )
            ->index();

        $table->string( 'owner_type' )
            ->nullable()
            ->default( null );

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
