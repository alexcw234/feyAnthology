<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

  /*
  *     Model properties and attributes
  */
  use SoftDeletes;

  protected $table = 'works';
  protected $primaryKey = 'workID';

  protected $fillable = array('catID','infoID','url','approved','subID','appID');

  protected $guarded = array('workID');

  protected $dates = ['deleted_at'];

  /*
  *     Relationship: Has one Info
  */
  public function info() {
      return $this->hasOne('Info','infoID','infoID');
  }

  /*
  *     Relationship: Has many Comments
  */
  public function comment() {
      return $this->hasMany('Comment','workID','workID');
  }

  /*
  *     Relationship: Belongs to one category
  */
  public function category() {
      return $this->belongsTo('Category','catID','catID');
  }

  /*
  *     Relationship: SubID Belongs to one user
  */
  public function subID() {
      return $this->belongsTo('User','userID','subID');
  }

  /*
  *     Relationship: AppID Belongs to one user
  */
  public function appID() {
      return $this->belongsTo('User','userID','appID');
  }


}
