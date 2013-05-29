<!doctype html>
<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ url() }}/stylesheets/style.css">
  </head>
  <body>
    <header role="banner" class="wrapper">
      <div class="grid">
        @include('layouts.navbar')
      </div>
    </header>
    <section role="main" class="wrapper">
      <div class="grid">
        <header class="grid__item one-whole">
          @yield('page_header')
        </header>
        <section class="grid__item one-whole">
          @yield('content')
        </section>
      </div>
    </section>
    <footer role="contentinfo" class="wrapper">
      <div class="grid">
        <div class="grid__item one-whole">
          <p class="smallprint">
            Made by <a href="http://aniketpant.com">Aniket</a><br>
            <a href="{{ url('/notes') }}">Notes</a>
          </p>
        </div>
      </div>
    </footer>
  </body>
</html>