Notes
=====

My notes from my everyday experience with L4.

## Creating routes

Routes are configured in `app/routes.php`

The following two routes are used for the `HomeController`.

    Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');

Creation of routes in L4 is similar to the way it is done in Ruby on Rails. Routes need to be configured manually and L4 gives a great control over routing than any other framework I have come across.

## Assets

I am still not sure about how asset management is done in L4. In the previous version it could be done by using the Asset library, but that library is not available now. Regardless, you can always point to the actual files in your templates.

## Templates

Creation of pages has become really easier in L4. All you need to do is add a line of code at the top of each controller and then use the template library.

    class HomeController extends BaseController {

      protected $layout = 'layouts.master';

      public function index()
      {
        $this->layout->content = View::make('pages.welcome')->with('title', 'Skidster');
      }

    }

It makes a lot of sense now. `$this->layout->content` passes the rendered view to the layout mentioned in the controller. This method has a lot of potential for faster site modification. Let's say I was using a layout called `layout1` and now I feel that I wish to change the master layout for the entire controller, all I need to do is change the layout given in `$layout` and the change will take place. Compared to the previous solution, now I do not need to change `@extend('layout')` statement for all of the views falling under my controller.

## RESTful Controllers

L4 has a very simple and intuitive method for creating RESTful controllers.

The line provided below registers the controller route. All methods under UserController will be accessible via `user/{method}`.

    Route::controller('user', 'UserController');

The controller has a simple naming convention for handling `GET` and `POST` requests.

    class UserController extends BaseController {

      // can be accessed by user/login
      public function getLogin()
      {
        // ...
      }

      public function postLogin()
      {
        // ...
      }

      // can be accessed by user/profile-picture
      public function getProfilePicture()
      {
        // ...
      }

    }

## Testing

The only requirement for running tests is `phpunit`. The installation can be done correctly be using `PEAR`. Once that is done, testing Laravel applications is a fairly simple tast. Tests are written in the following manner:

    class HomeControllerTest extends TestCase {

      public function testGetHome()
      {
        $this->call('GET', '/');
        $this->assertResponseOk();
      }

    }

And for testing filters, a small change needs to be made.

    class UserControllerTest extends TestCase {

      public function testGetDashboardFail()
      {
        Route::enableFilters();

        $this->call('GET', 'user/dashboard');
        $this->assertRedirectedTo('user/login');
      }

    }