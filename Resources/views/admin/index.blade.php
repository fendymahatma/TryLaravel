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
{{ trans('alay::admin.hello') }}
@stop