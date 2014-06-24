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
		$this->app['router']->controller('alay', 'Saas\Alay\Controllers\FooController');

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
		$this->app['alay.foo'] = $this->app->share(function($app)
		{
			return new Foo($app);
		});

		// Attach the creator
		$this->app['alay.creator'] = $this->app->share(function($app)
		{
			return new AlayCreator($app);
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
				'label' => 'Dummy',
				'icon' => 'lightbulb',             
				'data' => array(
					// Example sub-menu
					array(
						'admin_route' => 'alay.actionsomething',// Admin route
						'admin_label' => 'Something',            // Menu label
						'icon' => 'caret-right',                 // Icon to be used
						'childs' => array()
					),

					array(
						'admin_route' => 'index',              // Admin route
						'admin_label' => 'Back to dashboard?', // Menu label
						'icon' => 'caret-right',               // Icon to be used
						'childs' => array()
					),

					// Example sub-menu that have another sub
					array(
						'admin_route' => 'alay.actionsomething',    // Admin route
						'admin_label' => 'Something With Sub-menu',  // Menu label
						'icon' => 'caret-right',                     // Icon to be used
						'childs' => array(                           // Menu-sub-context
							array(
								'admin_route' => 'alay.actionsomething', // Admin route
								'admin_label' => 'Sub-Something',         // Menu label
								'icon' => 'caret-right',                  // Icon to be used
								'childs' => array(),                      // Sub-menu
							),
							array(
								'admin_route' => 'index',           // Admin route
								'admin_label' => 'Back to admin',   // Menu label
								'icon' => 'caret-right',            // Icon to be used
								'childs' => array(),                // Sub-menu
							)
						)
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