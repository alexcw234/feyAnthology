<?php

namespace App\Repositories;

use App\Type;
use DB;
use Response;

class generateFormRepository {

  public function generateAddNewForm($typeID)
  {
      $selectedType = Type::select(DB::raw('akeys("expectedFields") as fieldnames'),DB::raw('avals("expectedFields") as fieldvals'))
      ->where('typeID','=',$typeID)->get()->toJson();

      $sType_decoded = json_decode($selectedType,true);
      $fieldNames = explode(',',substr($sType_decoded[0]['fieldnames'],1,-1));
      $fieldVals = explode('","',substr($sType_decoded[0]['fieldvals'],2,-2));

      $form = "";

      $counter = 0;
      foreach ($fieldNames as $name)
      {
        $valArray = explode(',',$fieldVals[$counter]);
        $form = $form . "<div class='Form_Elem'><div class='Form_Elem_Title'>";

        $form = $form . "$name";

        if ($valArray[1] == 'true')
        {
          $form = $form . "<font color='red'>*</font> : </div>";
        }
        else
        {
          $form = $form . " : </div>";
        }
        $form = $form . "<div class='Form_Elem_Input ";
        switch($valArray[0]){
              case 'short':
                $form = $form . "Form_Elem_Input_Short'>";
                break;
              case 'long':
                $form = $form . "Form_Elem_Input_Long'>";
                break;
              case 'box':
                $form = $form . "Form_Elem_Input_Box'>";
                break;
              default:
                break;
              }

          if ($valArray[0] == 'box')
          {
                if ($valArray[1] == 'true')
                {
                  $form = $form . "<textarea type = 'text' class='Form_Elem_Text_Area' name='$name' ng-model='newentry.$name' required></textarea>";
                }
                else
                {
                  $form = $form . "<textarea type = 'text' class='Form_Elem_Text_Area' name='$name' ng-model='newentry.$name' required></textarea>";
                }
          }
          else
          {
                if ($valArray[1] == 'true')
                {
                  $form = $form . "<input type = 'text' name='$name' ng-model='newentry.$name' required>";
                }
                else
                {
                  $form = $form . "<input type = 'text' name='$name' ng-model='newentry.$name'>";
                }

          }
          $form = $form . "</div></div>";
          $counter++;
      }

      return $form;

  }

}
 ?>
