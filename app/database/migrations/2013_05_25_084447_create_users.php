<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function($table)
    {
      $table->increments('id');
      $table->string('email', '80');
      $table->string('password', '60');
      $table->text('first_name');
      $table->text('last_name');
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
    Schema::drop('users');
  }

}