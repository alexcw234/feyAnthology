<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use SoftDeletes;

    protected $primaryKey = 'userID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    protected $guarded = array('userID');
    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /*
    *     Relationship: Has many Work:subID
    */
    protected function subID() {
        return $this->hasMany('Work','subID','userID');
    }

    /*
    *     Relationship: Has many Work:appID
    */
    protected function appID() {
        return $this->hasMany('Work','appID','userID');
    }

    /*
    *     Relationship: Has many comments
    */
    protected function comment() {
        return $this->hasMany('Comment','userID','userID');
    }

    /*
    *     Relationship: Has many usersgroupscats (Belongs to many groups and cats)
    */
    public function ugc() {
        return $this->hasMany('UGC','userID','userID');
    }

}
