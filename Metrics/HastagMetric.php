<?php 

namespace Saas\Alay\Metrics;

use Saas\Alay\Models\Alay;
use Saas\Alay\Models\Hastag;

class HastagMetric extends BaseSocialMetric
{
	protected $name ;
	/**
	 * @{inheritDoc}
	 */
	public function getName()
	{
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
	/**
	 * @{inheritDoc}
	 */
	public function getQueryBuilder()
	{
		return Hastag::leftJoin('alay', 'alay.id', '=', 'hastag.alay_id')
						->where('hastag.hastag', $this->name)
						->groupBy('hastag.hastag');
	}
}
// SELECT alay.provider, alay.id, COUNT( hastag.hastag ) AS Total_Hastag
// FROM hastag
// LEFT JOIN alay ON alay.id = hastag.alay_id
// WHERE alay.provider =  'twitter'
// GROUP BY hastag.hastag