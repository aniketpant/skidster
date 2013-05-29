@section('title')
Profile
@stop

@section('page_header')
<h1>Profile</h1>
@stop

@section('content')
{{ Form::open(array('url' => 'user/profile', 'class' => 'grid one-half')) }}
<ul class="grid__item one-whole form-fields">
  <li>
    {{ Form::label('email', 'Email'); }}
    {{ Form::email('email', $user->email, array('class' => 'text-input', 'disabled' => 'true')); }}
  </li>
  <li>
    {{ Form::label('first_name', 'First Name'); }}
    {{ Form::text('first_name', $user->first_name, array('class' => 'text-input')); }}
  </li>
  <li>
    {{ Form::label('last_name', 'Last Name'); }}
    {{ Form::text('last_name', $user->last_name, array('class' => 'text-input')); }}
  </li>
  <li>
    <label for="new_password">New Password <small class="additional">Enter a new password to change it. Otherwise, let this be empty.</small></label>
    {{ Form::password('new_password', array('class' => 'text-input')); }}
  </li>
  <li>
    {{ Form::submit('Update', array('class' => 'btn btn--small btn--full')); }}
  </li>
</ul>
{{ Form::close(); }}

<div class="highlight islet push--top">
  <p>Press this button if you wish to delete your account.</p>
  <a class="btn btn--small btn--delete" href="{{ url('/user/delete') }}">Delete</a>
</div>

@if (Session::get('message'))
<div class="islet">
<p><span class="notice message">{{ Session::get('message') }}</span></p>
</div>
@endif

@if ($errors->all())
<div class="islet">
  @foreach ($errors->all('<p><span class="notice error">:message</span></p>') as $error)
  {{ $error }}
  @endforeach
  @endif
</div>
@stop