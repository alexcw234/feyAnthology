<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{

  /*
  *     Model properties and attributes
  */
  use SoftDeletes;

  protected $table = 'types';
  protected $primaryKey = 'typeID';

  protected $fillable = array('contentType','expectedFields');

  protected $dates = ['deleted_at'];


    /*
    *     Relationship: Belongs to one work
    */
    public function work() {

        return  $this->belongsTo('Work','typeID','typeID');

    }



}
