<?php namespace Saas\Alay\Models;

use Illuminate\Database\Eloquent\Model;

class Alay extends Model
{
	protected $table = 'alay';
	protected $guarded = array();

	public function hastag()
    {
        return $this->hasOne('Saas\Alay\Models\Hastag', 'alay_id');
    }

}