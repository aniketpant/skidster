<?php

class UserTableSeeder extends Seeder {

  public function run()
  {
    User::create(
      array(
        'email' => 'me@aniketpant.com',
        'password' => Hash::make('password'),
        'first_name' => 'Aniket',
        'last_name' => 'Pant'
      ));

    User::create(
      array(
        'email' => 'test@skidster.com',
        'password' => Hash::make('skidster'),
        'first_name' => 'Skidster',
        'last_name' => 'Tester'
      ));
  }

}