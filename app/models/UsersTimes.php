<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UsersTimes extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_times';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('weekday','time_in','time_out'); 

	public $timestamps = false;

	static public function getUserTimes($user_id = null) {
		if (is_null($user_id)) {
			$user_id = Auth::user()->id;
		}
		return UsersTimes::where(['user_id'=>$user_id])->get();
	}

}