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
        'name', 'email', 'password',
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
    *     Relationship: Belongs to many groups
    */
    public function group() {
        return $this->belongsToMany('Group','usersgroupscats','groupID','groupID')
        ->withPivot('catID')->withTimestamps();
    }

    /*
    *     Relationship: Belongs to many Categories
    */
    public function category() {
        return $this->belongsToMany('Category','usersgroupscats','catID','catID')
        ->withPivot('groupID')->withTimestamps();
    }



}
