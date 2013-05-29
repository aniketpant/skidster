<?php

class UserControllerTest extends TestCase {

  private $email_pass, $email_fail;
  private $password_pass, $password_fail;

  public function __construct()
  {
    $this->email_pass = 'test@skidster.com';
    $this->password_pass = 'skidster';

    $this->email_fail = 'foo@bar.com';
    $this->password_fail = 'foobar';
  }

  public function testGetLogin()
  {
    $this->call('GET', 'user/login');
    $this->assertResponseOk();
  }
  public function testGetRegister()
  {
    $this->call('GET', 'user/register');
    $this->assertResponseOk();
  }

  public function testGetDashboard()
  {
    $user = new User(array('email' => $this->email_pass));
    $this->be($user);

    Route::enableFilters();

    $this->call('GET', 'user/dashboard');
    $this->assertResponseOk();
  }

  public function testGetDashboardFail()
  {
    Route::enableFilters();

    $this->call('GET', 'user/dashboard');
    $this->assertRedirectedTo('user/login');
  }

  public function testPostLogin()
  {
    $this->call('POST', 'user/login', array('email' => $this->email_pass, 'password' => $this->password_pass));
    $this->assertRedirectedTo('user/dashboard');
  }

  public function testPostLoginFail()
  {
    $this->call('POST', 'user/login', array('email' => $this->email_fail, 'password' => $this->password_fail));
    $this->assertRedirectedTo('user/login');
  }

  public function testPostRegister()
  {
    $this->call('POST', 'user/register', array('email' => $this->email_fail, 'password' => $this->password_fail, 'password_confirmation' => $this->password_fail));
    $this->assertRedirectedTo('user/login');

    $user = User::where('email', '=', $this->email_fail);
    $user->delete();
  }

  public function testPostRegisterFail()
  {
    $this->call('POST', 'user/register', array('email' => $this->email_pass, 'password' => $this->password_pass, 'password_confirmation' => $this->password_pass));
    $this->assertRedirectedTo('user/register');
  }

}