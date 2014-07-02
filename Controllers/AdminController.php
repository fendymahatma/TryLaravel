<?php

namespace Saas\Alay\Controllers;

use Saas\Admin\PackageController as BaseController;
use Saas\Alay\Models\Alay;
use Saas\Alay\Models\Hastag;
use Saas\Social\Models\SocialPost;
use Saas\Social\Models\SocialConnection;
use Saas\Social\Facades\Social;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use User, Groups, Auth;
use Exception;

class AdminController extends BaseController
{
	public static $type = self::REST;


	public function getIndex()
	{
		$alay = Alay::with('hastags')->get()->all();
		$user = Auth::user();

		$brands = Groups::getRelationProvider()->findUserBrands($user->id, true);
		$providers = array();
		foreach($user->socialConnections()->get()->all() as $provider) {
			$providers[$provider->provider] = $provider;
		}

		$user_social_id = $provider->id;

		$this->viewData = array(
			'title' => trans('Alay'),
			'user' => $user,
			'alay' => $alay,
			'hastag' => $hastag,
			'brands' => $brands,
			'providers' => $providers,
			'user_social_id' => $user_social_id,
		);

		$this->setupLayout();
	}

	public function postIndex()
	{
		$alay = new Alay;
        $alay->user    		= Input::get('email');
        $alay->provider    	= Input::get('provider');
        $alay->pesan  		= Input::get('status');
        $alay->save();

        $alay_id = $alay->id;

		$user_social_id = Input::get('user_social');
        $status			= Input::get('status');

        preg_match_all("/(#\w+)/", $status, $matches);
        $total = (count($matches, COUNT_RECURSIVE)/2)-2 ;
		
		for ($i=0; $i<=$total; $i++ ){
			$hastag = new Hastag;

			$hastag->alay_id = $alay_id;
			$hastag->hastag  = $matches[0][$i];
			$hastag->save();
		}

		try {
			$task = Social::scheduleTask(array(
					'social_account_id' => $user_social_id,
					'message' 			=> $status,
					'priority' 			=> 'immediately'
				));

			return Redirect::back()->with('message', 'Queue'.$task->getKey());
		} catch (Exception $e) {
			return Redirect::back()->with('error', $e->getMessage());
		}
	}
}