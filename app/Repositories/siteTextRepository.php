<?php

namespace App\Repositories;

use App\UGC;
use App\User;
use App\Group;
use App\Category;
use DB;
use Response;

class siteTextRepository {


  /**
  * Queries for the default category. Must be called first. The return
  * object is passed to the other load functions.
  *
  */
  public function loadDefault()
  {
    return Category::select('description','options')->where('catID',1)->get()->toArray();
  }

  public function loadHeader($defaultCat)
  {

    return $defaultCat[0]['description'];

  }

  public function loadUpdates($defaultCat)
  {
    $options = json_decode($defaultCat[0]['options'],true);
    return $options['updates'];
  }

  public function loadAbout($defaultCat)
  {
    $options = json_decode($defaultCat[0]['options'],true);
    return $options['aboutpage_description'];
  }

  public function loadFront($defaultCat)
  {
    $options = json_decode($defaultCat[0]['options'],true);
    return $options['frontpage_description'];
  }




}
 ?>
