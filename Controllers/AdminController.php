<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;
use Saas\Alay\Models\Alay;
use Saas\Alay\Models\Hastag;
use User, Groups, Auth;

class AdminController extends BaseController
{
	public static $type = self::REST;


	public function getIndex()
	{
		$alay = Alay::all();
		$hastag = Hastag::all();
		$user = Auth::user();
		$brands = Groups::getRelationProvider()->findUserBrands($user->id, true);
		$providers = array();
		foreach($user->socialConnections()->get()->all() as $provider) {
			$providers[$provider->provider] = $provider; 
		}


		$this->viewData = array(
			'title' => trans('Alay'),
			'user' => $user,
			'alay' => $alay,
			'hastag' => $hastag,
			'brands' => $brands,
			'providers' => $providers,
		);

		$this->setupLayout();
	}
}