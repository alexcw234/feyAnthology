<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{


      /*
      *     Model properties and attributes
      */

      use SoftDeletes;

      protected $table = 'groups';
      protected $primaryKey = 'groupID';

      protected $fillable = array('groupName');
      protected $guarded = array('groupID');
      protected $dates = ['deleted_at'];


      /*
      *     Relationship: Belongs to many users
      */
      public function user() {
          return $this->belongsToMany('User','usersgroupscats','userID','userID')
          ->withPivot('catID')->withTimestamps();
      }


      /*
      *     Relationship: Belongs to many categories
      */
      public function category() {
          return $this->belongsToMany('Category','usersgroupscats','catID','catID')
          ->withPivot('userID')->withTimestamps();
      }

}
