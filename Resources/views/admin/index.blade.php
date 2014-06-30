@extends('layouts.admin')

@section('admin_icon', 'lightbulb')

@section('admin_title', 'Alay Resources')

@section('admin_breadcrumb')
<ul class='breadcrumb'>
    <li>
        <a href="{{ AdminURL::route('alay.something') }}"><i class='icon-lightbulb'> </i>Alay Resource</a>
    </li>
</ul>
@stop

@section('admin_content')
	
<div class='container'>
	<div class='row'>
		<div class='col-md-6'>
			Chose Your Social Acount Alayers !!
			
		</div>
		<div class='col-md-6'>
			Input Your Status - {{ Auth::user()->email }} - {{ Auth::user()->first_name }}

		</div>
	</div>
</div><!-- container -->

@stop