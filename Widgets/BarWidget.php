<?php namespace Saas\Alay\Widgets;

use Saas\Admin\Contracts\AbstractWidget;

class BarWidget extends AbstractWidget
{
	public function hello()
	{
		$this->widgetData = array('email' => $this->app['auth']->user()->email);
		$this->setupWidgetLayout(__METHOD__);
	}
}