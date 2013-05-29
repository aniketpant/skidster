@section('title')
Dashboard
@stop

@section('page_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>Welcome to your dashboard, <strong>{{ Session::get('full_name') }}</strong>.</p>
@stop