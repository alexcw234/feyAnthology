<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{


      /*
      *     Model properties and attributes
      */

      use SoftDeletes;

      protected $table = 'groups';
      protected $primaryKey = 'groupID';

      protected $fillable = array('groupName');
      protected $dates = ['deleted_at'];


      /*
      *     Relationship: Has many usersgroupscats (Belongs to many groups and cats)
      */
      public function ugc() {
          return $this->hasMany('UGC','groupID','groupID');
      }

      /*
      *     Relationship: Belongs to 1 user for global
      */
      public function user() {
          return $this->belongsTo('User','globalID','groupID');
      }
}
