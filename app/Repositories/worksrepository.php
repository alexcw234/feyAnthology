<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Work;
use App\Type;
use App\User;
use App\UGC;
use App\Group;
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
    * Queries database for all pending works based on catID
    *
    */
      public function getpendingworks($catID)
      {

        return Work::join('types','works.typeID','=','types.typeID')
        ->join('users','works.subID','=','users.userID')
        ->select('workID','contentType','url','info',DB::raw('akeys(tags) as tags'),'featured','username','subID','subDate')
        ->where('catID','=',$catID)
        ->where('approved',null)
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
      ->select('workID','catID','contentType','expectedFields','featured','url','info',
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
    * Validates and adds new entry.
    *
    * @return Response
    */
    public function newentry($catID, $infos, $address, $typeID, $tags, $userID)
    {
        foreach ($infos as $key => $value)
        {
            $infos[$key] = urldecode($infos[$key]);
        }
            $address = urldecode($address);

            $workID = Work::create([
              'catID' => $catID,
              'typeID' => $typeID,
              'url' => $address,
              'info' => json_encode($infos),
              'tags' => $tags,
              'approved' => null,
              'subID' => $userID,
              'subDate' => Carbon::now(),
            ]);


            return $workID;
    }

    /**
    * Validates and adds new entry, bypasses moderation step
    *
    * @return Response
    */
    public function forceentry($catID, $infos, $address, $typeID, $tags, $userID)
    {
        foreach ($infos as $key => $value)
        {
            $infos[$key] = urldecode($infos[$key]);
        }
            $address = urldecode($address);

            $newwork = Work::create([
              'catID' => $catID,
              'typeID' => $typeID,
              'url' => $address,
              'info' => json_encode($infos),
              'tags' => $tags,
              'approved' => true,
              'subID' => $userID,
              'subDate' => Carbon::now(),
            ]);
            $newwork->appID = $userID;
            $newwork->appDate = Carbon::now();
            $newwork->save();

            return $newwork;
    }

    /**
    * Updates an existing entry
    *
    * @return Response
    */
    public function update($workID, $catID, $infos, $address, $typeID, $tags, $userID)
    {
        foreach ($infos as $key => $value)
        {
            $infos[$key] = urldecode($infos[$key]);
        }
            $address = urldecode($address);

            $updatework = Work::where('workID',$workID)->update([
              'catID' => $catID,
              'typeID' => $typeID,
              'url' => $address,
              'info' => json_encode($infos),
              'tags' => $tags,
              'approved' => true,
              'appID' => $userID,
              'appDate' => Carbon::now(),
            ]);

            return $updatework;
    }



    /**
    * Sets work approval based on ID
    *
    *
    */
    public function setApproval($workID,$userID,$approval,$comment)
    {
          $work = Work::find($workID);

          $work->approved = $approval;
          $work->appID = $userID;
          $work->appDate = Carbon::now();
          $work->save();

    }




}

?>
