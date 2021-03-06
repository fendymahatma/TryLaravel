<?php namespace Saas\Alay;

use Saas\Support\ServiceProvider;
use Saas\Admin\Metric;
use Saas\Alay\Models\Hastag;
use Saas\Alay\Models\Alay;
use Saas\Alay\Metrics\HastagMetric;

class AlayServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('saas/alay', 'alay', __DIR__.'/Resources/');
		
		$app = $this->app;
		$this->app['router']->post('alay/metric', array(
			'as' => 'alay.metric',
			function() use ($app) {
				$metric = new Metric($app);
				
				//todo query kan hastag secara unik
				$hastags = Hastag::orderBy('hastag.hastag', 'desc')->groupBy('hastag.hastag')->take(5)->get();
				//loop hasil query hastag
				$hastags->each(function($item) use($metric) {
					//inisiasikan hastag metric
					$hastagMetric = new HastagMetric();
					//set hastag metric name sebagai title dari hastag
					$hastagMetric->setName($item->hastag);
					//set hastag metric kedalam metric contex
					$metric->setContext($hastagMetric);
				});
				return $metric->handleRequest(app('request'));
			}
		));
		// EXPERIMENTAL!
		// Here we register widget to generate a partial view
		//$this->app['admin.package_widget']->register('alay', 'Saas\Alay\Widgets\BarWidget');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Here you may register your package's specific provider
		$this->app['alay.alay'] = $this->app->share(function($app)
		{
			return new Alay($alay);
		});

		// $this->app['alay.metric'] = $this->app->share(function($app)
		// {			
		// 	return new Metric($app);
		// });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('alay');
	}

	/**
	 * Get all menu provided by the provider.
	 *
	 * @return array
	 */
	public function providesMenu()
	{
		return array(
			'sidebar' => array(

				// Alay sidebar start
				'url' => '#',
				'label' => 'Alay',
				'icon' => 'lightbulb',             
				'data' => array(
					// Example sub-menu
					array(
						'admin_route' => 'admin.index',// Admin route
						'admin_label' => 'Overview',            // Menu label
						'icon' => 'caret-right',                 // Icon to be used
						'childs' => array()
					),
				)
				// Leaderboard sidebar end

			)
		);
	}

	public function resourcesPath()
    {
        return realpath(__DIR__.'/Resources/');
    }

}