<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';
    protected $primaryKey = 'id';
    protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


//    public function transactions(){
//        return $this->hasMany('Transaction', 'user_id', 'id');
//    }
//
//    public function coins(){
//        return $this->hasOne('UserCoins', 'user_id', 'id');
//    }
}
