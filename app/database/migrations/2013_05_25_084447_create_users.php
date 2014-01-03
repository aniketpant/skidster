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
    Schema::create('users', function($t)
    {
      $t->increments('id');
      $t->string('email', '80');
      $t->string('password', '60');
      $t->text('first_name');
      $t->text('last_name');
      $t->timestamps();
      $t->timestamp('deleted_at');
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