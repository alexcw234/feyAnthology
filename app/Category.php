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
  *     Relationship: Has many usersgroupscats (Belongs to many users and groups)
  */
  public function ugc() {
      return $this->hasMany('UGC','catID','catID');
  }

}
