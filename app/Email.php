<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany(EmailTracking::class);
    }

    /**
     * Email Validator
     * @param $inputs
     * @return mixed
     */
    public static function validate($inputs){
        $validator = Validator::make($inputs, array(
            'subject' => 'required|max:255',
        ));

        return $validator;
    }
}
