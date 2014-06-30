<?php namespace Saas\Alay;

use Saas\Support\ServiceProvider;

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
		// $this->app['router']->post('alay/metric', array(
		// 	'as' => 'alay.metric',
		// 	'before' => 'can_access_alay_panel',
		// 	function() {
		// 		return app('alay.metric')->handleRequest(app('request'));
		// 	}
		// ));
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