<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  /*
  *     Model properties and attributes
  */
  use SoftDeletes;

  protected $table = 'comments';
  protected $primaryKey = 'commentID';

  protected $fillable = array('workID','userID','comment');
  protected $guarded = array('commentID');
  protected $dates = ['deleted_at'];


  /*
  *     Relationship: Belongs to one work
  */
  public function work() {

      return  $this->belongsTo('Work','workID','workID');

  }


  /*
  *     Relationship: Belongs to one user
  */
  public function user() {

      return  $this->belongsTo('User','userID','userID');

  }



}
