<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;

class FooController extends BaseController
{
	public static $type = self::REST;

	/**
	 * This action will accessible from :
	 * GET /alay/something
	 * @see ./src/Dummy/AlayServiceProvider.php
	 */
	public function getSomething()
	{
		$this->viewData = array(
			'title' => trans('alay::alay.alay_title_alay_modul'),
			'hello' => 'alay::alay.hello',
		);

		$this->setupLayout();
	}
}