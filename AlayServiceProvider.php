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

		// While any administrative controller could be automatically enabled from application,
		// we still need to register any "front" controllers (if our package provides one.)
		$this->app['router']->controller('alay', 'Saas\Alay\Controllers\AlayController');

		// EXPERIMENTAL!
		// Here we register widget to generate a partial view
		$this->app['admin.package_widget']->register('alay', 'Saas\Alay\Widgets\BarWidget');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// Here you may register your package's specific provider
		$this->app['alay.Alay'] = $this->app->share(function($app)
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
						'admin_route' => 'alay.index',// Admin route
						'admin_label' => 'Overview',            // Menu label
						'icon' => 'caret-right',                 // Icon to be used
						'childs' => array()
					),

					),
				)
				// Alay sidebar end

			)
		);
	}

	public function resourcesPath()
    {
        return realpath(__DIR__.'/Resources/');
    }

}