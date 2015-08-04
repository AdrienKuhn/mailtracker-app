<?php

namespace MailTracker;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

class Email extends Model
{

	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * User relationship
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Email trackings relationship
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function email_trackings()
	{
		return $this->hasMany(EmailTracking::class)
				->where('ip', '!=', env('IGNORE_IP', 'null'));
				// Ignore defined IP in .env file
	}

	/**
	 * Email Validator
	 * @param $inputs
	 * @return mixed
	 */
	public static function validate($inputs){
		$validator = Validator::make($inputs, array(
			'title' => 'required|max:255',
		));

		return $validator;
	}
}
