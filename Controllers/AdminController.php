<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;
use User, Group, Auth;

class AdminController extends BaseController
{
	public static $type = self::REST;


	public function getIndex()
	{
		$alay = Alay::alay();
		$hastag = Hastag::hastag();
		$user = Auth::user();
		$user->load('socialConnection');


		$this->viewData = array(
			'title' => trans('Alay'),
			'user' => $user,
			'alay' => $alay,
			'hastag' => $hastag,
		);

		$this->setupLayout();
	}
}