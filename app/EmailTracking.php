<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class EmailTracking extends Model
{

	/**
	 * Email relationship
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function email()
	{
		return $this->hasOne(Email::class);
	}


	/**
	 * Email Tracking Validator
	 * @param $inputs
	 * @return mixed
	 */
	public static function validate($inputs){
		$validator = Validator::make($inputs, array(
			'ip' 			=> 'required|max:45',
			'host' 			=> 'string',
			'user_agent' 	=> 'string',
			'country' 		=> 'string'
		));

		return $validator;
	}
}
