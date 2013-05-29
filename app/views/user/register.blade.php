@section('title')
Register
@stop

@section('page_header')
<h1>Register</h1>
@stop

@section('content')
{{ Form::open(array('url' => 'user/register', 'class' => 'grid one-half')); }}
<ul class="grid__item one-whole form-fields">
  <li>
    {{ Form::label('email', 'Email'); }}
    {{ Form::email('email', Input::old('email'), array('class' => 'text-input')); }}
  </li>
  <li>
    {{ Form::label('password', 'Password'); }}
    {{ Form::password('password', array('class' => 'text-input')); }}
  </li>
  <li>
    {{ Form::label('password_confirmation', 'Confirm Password'); }}
    {{ Form::password('password_confirmation', array('class' => 'text-input')); }}
  </li>
  <li>
    {{ Form::submit('Register', array('class' => 'btn btn--small btn--full')); }}
  </li>
</ul>
{{ Form::close(); }}

@if ($errors->all())
<div class="islet">
@foreach ($errors->all('<p><span class="notice error">:message</span></p>') as $error)
{{ $error }}
@endforeach
@endif
</div>
@stop