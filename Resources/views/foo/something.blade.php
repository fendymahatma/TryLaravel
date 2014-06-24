@extends(Auth::check() ? 'layouts.dashboard' : 'layouts.guest')

@section('title', $title)
@section('content')
<h1>{{ trans($hello) }}</h1>
<pre>{{ Foo::bar() }}</pre>
@endsection