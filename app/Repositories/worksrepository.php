<?php
namespace App\Repositories;

use App\Work;
use App\Type;
use DB;
use Response;

class WorksRepository {


  /**
  * Queries database for all works based on catID
  *
  */
    public function getallworks($catID) {

      return Work::join('types','works.typeID','=','types.typeID')
      ->select('workID','catID','contentType','expectedFields','url','info','tags')
      ->where('catID','=',$catID)
      ->where('approved',true)
      ->get();

    }


    /**
    * Will display all works for a category that satisfy query.
    *
    * @return Response
    */
    public function retrieve($catID, $infoReq, $tagReq)
    {

      $worksfromcat = Work::join('types','works.typeID','=','types.typeID')
      ->select('workID','catID','contentType','expectedFields','url','info','tags')
      ->where('catID','=',$catID)
      ->where('approved',true)
      ->where(function($query) use ($infoReq){



      })
      ->where(function($query) use ($tagReq){

          foreach ($tag in $tagReq)
          {
          $query->orWhere('tags', 'like', '%'. $tag . '%');
        }


      })
      ->get();

    return $worksfromcat->toJson();
    }


}

?>
