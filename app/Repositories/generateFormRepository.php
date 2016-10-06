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

      $precounter = 0;
      foreach ($fieldVals as $val)
      {
        $valArray_temp = explode(',',$fieldVals[$precounter]);
        if ($valArray_temp[2] == 'top')
        {
          $tempval = $fieldVals[$precounter];
          unset($fieldVals[$precounter]);
          $fieldVals = array_values($fieldVals);
          array_unshift($fieldVals,$tempval);
          $tempname = $fieldNames[$precounter];
          unset($fieldNames[$precounter]);
          $fieldNames = array_values($fieldNames);
          array_unshift($fieldNames,$tempname);
        }
        else if ($valArray_temp[2] == 'bottom')
        {
          $tempval = $fieldVals[$precounter];
          unset($fieldVals[$precounter]);
          $fieldVals = array_values($fieldVals);
          array_push($fieldVals,$tempval);
          $tempname = $fieldNames[$precounter];
          unset($fieldNames[$precounter]);
          $fieldNames = array_values($fieldNames);
          array_push($fieldNames,$tempname);
        }
        $precounter++;
      }


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
        $form = $form . "<div class='Form_Elem_Wrapper ";
        switch($valArray[0]){
              case 'short':
                $form = $form . "Form_Elem_Wrapper_Short'>";
                break;
              case 'long':
                $form = $form . "Form_Elem_Wrapper_Long'>";
                break;
              case 'box':
                $form = $form . "Form_Elem_Wrapper_Box'>";
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
                  $form = $form . "<input class='Form_Elem_Input' type = 'text' name='$name' ng-model='newentry.$name' required>";
                }
                else
                {
                  $form = $form . "<input class='Form_Elem_Input' type = 'text' name='$name' ng-model='newentry.$name'>";
                }

          }
          $form = $form . "</div></div>";
          $counter++;
      }

      return $form;

  }

}
 ?>
