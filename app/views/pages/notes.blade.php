@section('title')
Notes
@stop

@section('page_header')
<h1>My notes from my everyday experience with L4</h1>
@stop

@section('content')
<h2>Creating routes</h2>

<p>Routes are configured in <code>app/routes.php</code>.</p>

<p>The following two routes are used for the <code>HomeController</code>.</p>

<pre><code><!--
-->Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');
</code></pre>

<p>Creation of routes in L4 is similar to the way it is done in Ruby on Rails. Routes need to be configured manually and L4 gives a great control over routing than any other framework I have come across.</p>

<h2>Assets</h2>

<p>I am still not sure about how asset management is done in L4. In the previous version it could be done by using the Asset library, but that library is not available now. Regardless, you can always point to the actual files in your templates.</p>

<h2>Templates</h2>

<p>Creation of pages has become really easier in L4. All you need to do is add a line of code at the top of each controller and then use the template library.</p>

<pre><code><!--
-->class HomeController extends BaseController {

  protected $layout = 'layouts.master';

  public function index()
  {
    <span class="code-comment">// Templating is beautiful in L4</span>
    $this->layout->content = View::make('pages.welcome');
  }

}
</code></pre>

<p>It makes a lot of sense now. <code>$this->layout->content</code> passes the rendered view to the layout mentioned in the controller. This method has a lot of potential for faster site modification. Let's say I was using a layout called <code>layout1</code> and now I feel that I wish to change the master layout for the entire controller, all I need to do is change the layout given in <code>$layout</code> and the change will take place. Compared to the previous solution, now I do not need to change <code>@extend('layout')</code> statement for all of the views falling under my controller.</p>

<h2>RESTful Controllers</h2>

<p>L4 has a very simple and intuitive method for creating RESTful controllers.</p>

<p>The line provided below registers the controller route. All methods under UserController will be accessible via <code>user/{method}</code>.</p>

<pre><code><!--
-->Route::controller('user', 'UserController');
</code></pre>

<p>The controller has a simple naming convention for handling <code>GET</code> and <code>POST</code> requests.</p>

<pre><code><!--
-->class UserController extends BaseController {

  <span class="code-comment">// can be accessed by user/login</span>
  public function getLogin()
  {
    <span class="code-comment">// ...</span>
  }

  public function postLogin()
  {
    <span class="code-comment">// ...</span>
  }

  <span class="code-comment">// can be accessed by user/profile-picture</span>
  public function getProfilePicture()
  {
    <span class="code-comment">// ...</span>
  }

}
</code></pre>
@stop