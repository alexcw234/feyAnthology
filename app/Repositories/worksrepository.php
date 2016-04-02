<?php
namespace App\Repositories;

use App\Work;
use DB;
use Response;

class WorksRepository {



    public function getallworks($catID) {

      return Work::select('workID','catID','typeID','url','info','tags')
      ->where('catID','=',$catID)
      ->where('approved',true)
      ->get();

    }

}

?>
