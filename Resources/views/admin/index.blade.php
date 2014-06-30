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

		<!-- Kiri -->
		<div class='col-md-6'>
			<div class="lead">
				Chose Your Social Acount Alayers !!
			</div>
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

		<!-- Kanan -->
		<div class='col-md-6'>
			{{ Form::open(array('url' => 'admin/alay', 'method' => 'post')) }}
	        <div class='row'>
	            <div class="lead">
	                <i class="icon-user text-contrast"></i>
	                Input Your Status - {{ Auth::user()->first_name }}
	            </div><!--/.lead-->

			<input type="input" class="form-control" name="email" value="{{ Auth::user()->email }}">
	            @if (array_key_exists('twitter', $providers))
	                <label class="checkbox-inline">
					  <input type="checkbox" value="Twitter" name="provider" checked> Twitter
					</label>
				@elseif (array_key_exists('facebook', $providers))
					<label class="checkbox-inline">
					  <input type="checkbox" value="Facebook" name="provider" checked> Facebook
					</label>
				@else
					<label class="checkbox-inline">
					  <input type="checkbox" value="Twitter" name="provider" checked> Twitter
					</label>
					<label class="checkbox-inline">
					  <input type="checkbox" value="Facebook" name="provider" checked> Facebook
					</label>
				@endif

	            <div class='form-group'>
	                <div class='controls'>
	                    <textarea class='form-control' rows="4" name='status' value="Update Your Status Alayers" ></textarea>
	                </div><!--/.controls-->
	            </div><!--/.form-group-->
	            
	            <div class='text-right'>
	                <button type="submit" class='btn btn-success btn-lg submit-form' rel='user-default'>
	                    <i class='icon-save'></i> Save
	                </button>
	            </div>
	   		</div><!--/.row-->
	        {{ Form::close() }}
		</div>

		<!-- Tabel -->
		<div class='col-md-12 box bordered-box purple-border' style=''>
	        <div class='box-header muted-background'>
	            <div class='title'>Daftar User</div>
	        </div><!--/.box-header-->
	        <div class='box-content box-no-padding'>
	            <table class='table table-bordered table-striped' style='margin-bottom:0;'>
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>User</th>
	                    <th>Provider</th>
	                    <th>Status</th>
	                    <th>Hastag</th>
	                </tr>
	            </thead>
	            <tbody>
	                @foreach($alay as $alay)
	                <tr>
	                	<td> {{ $alay->id }} </td>
	                    <td> {{ $alay->user }} </td>
	                    <td> {{ $alay->provider }} </td>
	                    <td> {{ $alay->pesan }} </td>
	                    <td>
	                    	@foreach( $alay->hastags as $hastag )
	                    		{{  $hastag->hastag  }}
	                    	@endforeach
	                    </td>
	                </tr>
	                @endforeach
	            </tbody>
	            </table>
	        </div><!--/.box-content-->
	    </div><!--/.col-md-12 box bordered-box-->
	</div>
</div><!-- container -->

@stop