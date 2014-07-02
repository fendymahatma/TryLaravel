<?php 

namespace Saas\Alay\Metrics;

use Saas\Admin\AbstractMetricContext;
use Saas\Alay\Models\Alay;

abstract class BaseSocialMetric extends AbstractMetricContext
{
	/**
	 * @{inheritDoc}
	 */
	public function getDaily($dateAttribute = '`hastag`.`created_at`')
	{
		return parent::getDaily($dateAttribute);
	}

	/**
	 * @{inheritDoc}
	 */
	public function getWeekly($dateAttribute = '`hastag`.`created_at`')
	{
		return parent::getWeekly($dateAttribute);
	}

	/**
	 * @{inheritDoc}
	 */
	public function getMonthly($dateAttribute = '`hastag`.`created_at`')
	{
		return parent::getMonthly($dateAttribute);
	}

	/**
	 * @{inheritDoc}
	 */
	public function getYearly($dateAttribute = '`hastag`.`created_at`')
	{
		return parent::getYearly($dateAttribute);
	}
}