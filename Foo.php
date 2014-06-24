<?php namespace Saas\Alay;

use Illuminate\Container\Container;

class Foo
{
	/**
	 * @var Container
	 */
	protected $app;

	/**
	 * Constructor
	 */
	public function __construct(Container $app)
	{
		$this->app = $app;
	}

	/**
	 * Simple method that will dump-out current HTTP request
	 */
	public function bar()
	{
		return $this->app['request'];
	}

}