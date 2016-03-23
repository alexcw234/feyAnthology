<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  /*
  *     Model properties and attributes
  */

  use SoftDeletes;

  protected $table = 'categories';
  protected $primaryKey = 'catID';

  protected $fillable = array('catName');
  protected $guarded = array('catID');
  protected $dates = ['deleted_at'];



  /*
  *     Relationship: Has many works
  */
  public function work() {
      return $this->hasMany('Work','catID','catID');
  }


  /*
  *     Relationship: Belongs to many users
  */
  public function user() {
      return $this->belongsToMany('User','usersgroupscats','userID','userID')
      ->withPivot('groupID')->withTimestamps();
  }


  /*
  *     Relationship: Belongs to many groups
  */
  public function group() {
      return $this->belongsToMany('Group','usersgroupscats','groupID','groupID')
      ->withPivot('userID')->withTimestamps();
  }


}
