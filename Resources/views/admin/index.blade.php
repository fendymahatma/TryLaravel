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

	<div class='row'>
    	<div class='col-sm-12'>
    		<div class='box chart-widget'>

    			<div class='box-content'>
		    		<ul class="nav nav-tabs nav-justified noBelow">
		    			<li class="active"><a class="tab-link" data-metric-type="daily" data-toggle='tab' href="#day-stats">{{trans('admin::admin.admin_day')}}</a></li>
		                <li class=""><a class="tab-link" data-metric-type="weekly" data-toggle='tab' href="#weekly-stats">{{trans('admin::admin.admin_week')}}</a></li>
		                <li class=""><a class="tab-link" data-metric-type="monthly" data-toggle='tab' href="#monthly-stats">{{trans('admin::admin.admin_month')}}</a></li>
		                <li class=""><a class="tab-link" data-metric-type="yearly" data-toggle='tab' href="#yearly-stats">{{trans('admin::admin.admin_year')}}</a></li>
		                <!-- <li class=""><a class="tab-link" data-metric-type="all" data-toggle='tab' href="#all-stats">All</a></li> -->
		            </ul>

		            <div class='tab-content'>
		                <div class='tab-pane fade active in' id='day-stats'>
		                    <div class="chart-container">
		                        <div id="performance-day" class='admin-chart'></div>
		                    </div>
		                </div><!--/.-->
		                <div class='tab-pane fade' id='weekly-stats'>
		                    <div class="chart-container">
		                        <div id="performance-week" class='admin-chart'></div>
		                    </div>
		                </div><!--/.-->

		                <div class='tab-pane fade' id='monthly-stats'>
		                    <div class="chart-container">
		                        <div id="performance-month" class='admin-chart'></div>
		                    </div>
		                </div><!--/.-->

		                <div class='tab-pane fade' id='yearly-stats'>
		                    <div class="chart-container">
		                        <div id="performance-year" class='admin-chart'></div>
		                    </div>
		                </div><!--/.-->

		                <!-- <div class='tab-pane fade' id='all-stats'>
		                    <div class="chart-container">
		                        <div id="performance-all" class='admin-chart'></div>
		                    </div>
		                </div> -->
		            </div><!--/.tab-content-->
		        </div><!--/.box-content-->
		    </div><!--/.box-->

    	</div><!--/.col-sm-4-->
    </div><!--/.row-->

</div><!-- container -->
@stop

{{-- <script> --}}
@section('inline_scripts')

	// Get the chart data
	function requestChartData(type, chart) {
	    $.ajax({
	        url: "{{ URL::route('alay.metric') }}",
	        data : {type : type},
	        type: "POST",
	        success: function(res) {
	        	if (res.data.length > 0) {
	        		$.each(res.data, function(i,data){
			            chart.addSeries(data);
	        		})
	        		chart.setSize($('#day-stats').width(),$('#day-stats').height())
	        	}
	        }
	    });
	}

	// Global date
    var now = new Date();
	var now_utc = new Date(now.getUTCFullYear(), now.getUTCMonth(), now.getUTCDate(),  now.getUTCHours(), now.getUTCMinutes(), now.getUTCSeconds());

    //Set global options for all charts on this view
    Highcharts.setOptions({
    	global: {
    		useUTC: true,
    		timezoneOffset: new Date(now_utc.getTime()).getTimezoneOffset()
    	},
        chart: {
            type: 'line',
            width: $('#day-stats').width(),
            height: $('#day-stats').height()
        },
        colors: ['#f34541', '#49bf67', '#00acec' ],
        subtitle: {

        },
        yAxis: {
            title: {
                text: 'Total'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }],
            endOnTick:false
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            align: 'right',
            verticalAlign: 'top',
            y: 0,
            floating: true,
            borderWidth: 0,
            x: -30
        },
        credits: {
            enabled: false
        }

    });

	// Time Variables used to get current state and
    // Make some Starting points
	var dayStart = 1;
	var weekStart = 7;
	var monthStart = 30;
	var yearStart = 365;

	var oneHour = 3600 * 1000
	var oneDay = 24 * oneHour;
	var oneWeek = oneDay * 7;
	var oneMonth = oneDay * 30;
	var oneYear = oneDay * 365;

	var oneDayAgo = new Date(now_utc.getTime() - oneDay + oneHour)
	var oneWeekAgo = new Date(now_utc.getTime() - oneWeek)
	var oneMonthAgo = new Date(now_utc.getTime() - oneMonth)
	var oneYearAgo = new Date(now_utc.getTime() - oneYear + oneMonth)

    // Time to start making charts
    var dailyChart = new Highcharts.Chart({
        chart: {
            renderTo: 'performance-day',
        },

        title: {
            text: "{{ trans('admin::admin.admin_activity_for_24') }}",
            align: 'left',
            x: 20
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%e of %b'
            }
        },
        plotOptions: {
            series: {
                pointStart: oneDayAgo.getTime(),
            	pointInterval: oneHour
            }
        },
        series: []
    });

	var weeklyChart = new Highcharts.Chart({
        chart: {
            renderTo: 'performance-week',
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%A, %b %e'
            },
            tickInterval:oneDay
        },
        title: {
            text: "{{ trans('admin::admin.admin_activity_for_7') }}",
            align: 'left',
            x: 20
        },
        plotOptions: {
            series: {
                pointStart: oneWeekAgo.getTime(),
            	pointInterval: oneDay
            }
        },
        series: []
    });

    var monthlyChart = new Highcharts.Chart({
        chart: {
            renderTo: 'performance-month',
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                hour: '%A, %b %e'
            },
            tickInterval:oneWeek
        },
        title: {
            text: "{{ trans('admin::admin.admin_activity_for_7') }}",
            align: 'left',
            x: 20
        },
        plotOptions: {
            series: {
                pointStart: oneMonthAgo.getTime(),
            	pointInterval: oneDay
            }
        },
        series: []
    });

    var yearlyChart = new Highcharts.Chart({
        chart: {
            renderTo: 'performance-year',
        },
        xAxis: {
            type: 'datetime',
            dateTimeLabelFormats: {
                day: '%B %Y'
            },
            tickInterval:oneMonth
        },
        title: {
            text: "{{ trans('admin::admin.admin_activity_for_365') }}",
            align: 'left',
            x: 20
        },
        plotOptions: {
            series: {
                pointStart: oneYearAgo.getTime(),
            	pointInterval: oneMonth
            }
        },
        series: []
    });
    
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
    	var link = $(e.target),
    		type = link.data('metric-type'),
    		container = $(link.attr('href'))

    	if (!container.data('metric-loaded')) {
    		// Load the data
    		switch (type) {
    			case 'weekly' :
    				requestChartData('weekly', weeklyChart)
    				break;

    			case 'monthly' :
    				requestChartData('monthly', monthlyChart)
    				break;

    			case 'yearly' :
    				requestChartData('yearly', yearlyChart)
    				break;

    			// case 'all':
    			// 	requestChartData('all', allTimeChart)
    			// 	break;
    		}

    		// mark to avoid re-load the data
    		container.data('metric-loaded', true)
    	}
	})
	// Load the daily
	requestChartData('daily', dailyChart)

    $(window).resize(function() {
	   dailyChart.setSize($('#day-stats').width(),$('#day-stats').height());
	   weeklyChart.setSize($('#day-stats').width(),$('#day-stats').height());
	   monthlyChart.setSize($('#day-stats').width(),$('#day-stats').height());
	   yearlyChart.setSize($('#day-stats').width(),$('#day-stats').height());
	   // allTimeChart.setSize($('#day-stats').width(),$('#day-stats').height());
	});
@stop