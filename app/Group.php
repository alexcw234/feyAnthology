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
      *     Relationship: Has many usersgroupscats (Belongs to many groups and cats)
      */
      public function ugc() {
          return $this->hasMany('UGC','groupID','groupID');
      }

}
