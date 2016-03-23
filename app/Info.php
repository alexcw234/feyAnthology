<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{

  /*
  *     Model properties and attributes
  */
  use SoftDeletes;

  protected $table = 'info';
  protected $primaryKey = 'infoID';

  protected $fillable = array('info');
  protected $guarded = array('infoID');

  protected $dates = ['deleted_at'];


    /*
    *     Relationship: Belongs to one work
    */
    public function work() {

        return  $this->belongsTo('Work','workID','workID');

    }



}
