<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Validator;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


	/**
	 * Emails relationship
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function emails()
	{
		return $this->hasMany(Email::class);
	}


	/**
	 * User Validator
	 * @param $inputs
	 * @return mixed
	 */
	public static function validate($inputs){
		$validator = Validator::make($inputs, array(
			'name' => 'required|max:255',
			'email'=> 'email|required',
			'password' => 'min:8|confirmed'
		));

		// If pushbullet checked, API key and device required
		$validator->sometimes('pushbullet_api_key', 'required', function($input)
		{
			return $input->pushbullet;
		});

		return $validator;
	}
}
