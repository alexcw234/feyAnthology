<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UGC extends Model
{
  protected $table = 'usersgroupscats';
  protected $primaryKey = 'ugcID';

  protected $fillable = array('userID','catID');



  /*
  *     Relationship: Belongs to many users
  */
  public function user() {
      return $this->belongsTo('User','userID','userID');
  }

  /*
  *     Relationship: Belongs to many groups
  */
  public function group() {
      return $this->belongsTo('Groups','groupID','groupID');

  }

  /*
  *     Relationship: Belongs to many cats
  */
  public function category() {
      return $this->belongsTo('Category','catID','catID');

  }

}
