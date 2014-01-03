<?php

class UserController extends BaseController {

        protected $layout = 'layouts.master';

        public function getLogin()
        {
    $this->layout->content = View::make('user.login');
        }

        public function postLogin()
        {
          $rules = array(
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
            );

          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails())
          {
            return Redirect::to('user/login')->withInput(Input::only('email'))->withErrors($validator);
          }
          else
          {
            if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
            {
              Log::debug('Authentication successful. Credentials are valid.');

                                $user = Auth::user();
                                $full_name = $user->getFullName();
                                Session::put('full_name', $full_name);

              return Redirect::to('user/dashboard');
            }
            else
            {
              Log::debug('Authentication failure.');

              Session::put('message', 'Incorrect credentials.');

              return Redirect::to('user/login')->withInput(Input::only('email'));
            }
          }
        }

        public function getRegister()
        {
    $this->layout->content = View::make('user.register');
        }

        public function postRegister()
        {
          $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            );

          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails())
          {
            return Redirect::to('user/register')->withInput(Input::only('email'))->withErrors($validator);
          }
          else
          {
                  $email = Input::get('email');
                  $password = Input::get('password');

                  $user = new User;
                  $user->email = $email;
                  $user->password = Hash::make($password);
                  if ($user->save())
                  {
                          Log::debug('Registration successful.');
              return Redirect::to('user/login')->withInput(Input::only('email'));
                  }
                  else
                  {
                          Log::debug('Registration failure.');
              return Redirect::to('user/register')->withInput(Input::only('email'));
                  }
          }
        }

        public function getDashboard()
        {
    $this->layout->content = View::make('user.dashboard');
        }

        public function getProfile()
        {
                $user = Auth::user();
    $this->layout->content = View::make('user.profile')->with('user', $user);
        }

        public function postProfile()
        {
          $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'min:6',
            );

          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails())
          {
            return Redirect::to('user/profile')->withErrors($validator);
          }
          else
          {
                        $user = Auth::user();

                  $first_name = Input::get('first_name');
                  $last_name = Input::get('last_name');
                  $new_password = Input::get('new_password');

                        if ($user->first_name != $first_name)
                                $user->first_name = $first_name;

                        if ($user->last_name != $last_name)
                                $user->last_name = $last_name;

                  if ($new_password != '' && $user->password != Hash::make($new_password))
                                $user->password = Hash::make($new_password);

                        $user->save();

      Session::put('message', 'Your profile has been successfully updated.');

                        return Redirect::to('user/profile');
          }
        }

        public function getLogout()
        {
                Auth::logout();
                Session::flush();
                return Redirect::to('/');
        }

}