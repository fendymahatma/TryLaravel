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

			<!-- Facebook -->
			<div class="lead">
                <i class="icon-facebook text-primary"></i>
                {{trans('user.user_facebook_account')}}
                asdas
            </div><!--/.lead-->
			@if (array_key_exists('facebook', $providers))
            <div class='form-group'>
                <!-- <p class='help-block'>Use your Google Plus account to share content out to your circles, or to invite your Google friends.</p> -->
                <div class='controls shift-down'>
                    <!-- <a class='btn btn-primary input-large'>Connect Your Facebook Account</a> -->
                    <div class='btn-group'>
                        <button class='btn btn-default'><i class='icon-link'> </i>{{trans('user.user_connected_as')}}{{ $providers['facebook']->provider_username }}</button>
                        <button class='btn dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='/auth/disconnect/facebook'>{{trans('user.user_disconnect_facebook')}}</a>
                            </li>
                        </ul>
                    </div><!--/.btn-group-->
                </div><!--/.controls-->
            </div><!--/.form-group-->
            @else
            <div class='form-group'>
                <p class='help-block'>{{trans('user.user_conn_to_fb_to_optionally')}}</p>
                <div class='controls shift-down'>
                    <a class='btn btn-primary' href='/auth/connect/facebook'>{{trans('user.user_conn_to_fb_account')}}</a>
                </div><!--/.controls-->
            </div><!--/.form-group-->
            @endif

            <!-- Twitter -->
            <div class="lead">
                <i class="icon-twitter text-primary"></i>
                {{trans('user.user_twitter_account')}}
            </div><!--/.lead-->
            @if (array_key_exists('twitter', $providers))
            <div class='form-group'>
                <!-- <p class='help-block'>Use your Google Plus account to share content out to your circles, or to invite your Google friends.</p> -->
                <div class='controls shift-down'>
                    <!-- <a class='btn btn-primary input-large'>Connect Your Facebook Account</a> -->
                    <div class='btn-group'>
                        <button class='btn btn-default'><i class='icon-link'> </i>{{trans('user.user_connected_as')}}{{ $providers['twitter']->provider_username }}</button>
                        <button class='btn dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                        </button>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='/auth/disconnect/twitter'>{{trans('user.user_disconnect_twitter')}}</a>
                            </li>
                        </ul>
                    </div><!--/.btn-group-->
                </div><!--/.controls-->
            </div><!--/.form-group-->
            @else
            <div class='form-group'>
                <p class='help-block'>{{trans('user.user_conn_to_twit_as_another')}}</p>
                <div class='controls shift-down'>
                    <a class='btn btn-primary' href='/auth/connect/twitter'>{{trans('user.user_conn_to_twit_account')}}</a>
                </div><!--/.controls-->
            </div><!--/.form-group-->
            @endif
		</div>
		<div class='col-md-6'>
			Input Your Status - {{ Auth::user()->email }} - {{ Auth::user()->first_name }}

		</div>
	</div>
</div><!-- container -->

@stop