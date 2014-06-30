<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;

class AdminController extends BaseController
{
	public static $type = self::REST;


	public function getIndex()
	{
		
		$this->viewData = array(
			'title' => trans('Alay'),
		);

		$this->setupLayout();
	}
}