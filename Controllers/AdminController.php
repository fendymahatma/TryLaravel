<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;

class AdminController extends BaseController
{
	public static $type = self::ARBITRARY;

	public static $actions = array(
		'something' => 'actionSomething',
	);

	/**
	 * This action will accessible from :
	 *
	 * GET|POST|PUT|DELETE /admin/alay/something
	 */
	public function actionSomething()
	{
		$this->viewData = array(
			'title' => trans('alay::alay.alay_title_alay_panel'),
		);

		$this->setupLayout();
	}
}