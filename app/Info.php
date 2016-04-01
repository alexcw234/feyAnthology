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

  protected $table = 'type';
  protected $primaryKey = 'typeID';

  protected $fillable = array('type','contentType','expectedFields');
  protected $guarded = array('typeID');

  protected $dates = ['deleted_at'];


    /*
    *     Relationship: Belongs to one work
    */
    public function work() {

        return  $this->belongsTo('Work','typeID','typeID');

    }



}
