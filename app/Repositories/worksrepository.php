<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Work;
use App\Type;
use DB;
use Response;

class WorksRepository
{


  /**
  * Queries database for all works based on catID
  *
  */
    public function getallworks($catID)
    {

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
    public function retrieve($catID, $infos, $type, $tags)
    {

    return  $worksfromcat =  Work::join('types','works.typeID','=','types.typeID')
      ->select('workID','catID','contentType','expectedFields','url','info',
      DB::raw('akeys(tags) as tags'))
      ->where('catID','=',$catID)
      ->where('approved',true)
      ->where(function($query) use ($type) {

        if ($type != "")
        {
            $query->where("contentType","=",$type);
        }

      })
      ->where(function($query) use ($infos){

          foreach($infos as $key => $value)
          {
            $key = preg_replace("/[^A-Za-z0-9 ]/", '', $key);

            $query->where("info->>'$key'",'ilike', $value);
          }


      })
      ->where(function($query) use ($tags){

              foreach ($tags as $tag)
              {
                if ($tag != "")
                {
                $query->whereRaw("exist(tags, ?)", array($tag));
                }

              }

        })
      ->get();

    }


    /**
    * Retrieve Tags from parameters.
    *
    * @return Response
    */
    public function parsetags($params)
    {

    return $params['tags'];

    }


    /**
    * Validates and adds new entry.
    *
    * @return Response
    */
    public function newentry($catID, $infos, $address, $type, $tags)
    {
        foreach ($infos as $key => $value)
        {
            $infos[$key] = urldecode($infos[$key]);
        }
            $address = urldecode($address);

        $tagstore = '';

        foreach ($tags as $tag)
        {
          $tagstore .= '"' . $tag . '" => "other",';
        }
            $workID = Work::create([
              'catID' => $catID,
              'typeID' => $type,
              'url' => $address,
              'info' => json_encode($infos),
              'tags' => $tagstore,
              'approved' => false,
              'subID' => 1,
              'subDate' => Carbon::now(),
            ]);


            return $workID;
    }




}

?>
