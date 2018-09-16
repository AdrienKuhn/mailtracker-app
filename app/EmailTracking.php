<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailTracking extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Email relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function email()
    {
        return $this->belongsTo(Email::class);
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
