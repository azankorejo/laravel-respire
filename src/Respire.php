<?php
namespace azankorejo\Respire;

class Respire {

  public function configPublished() : bool
  {
    return (boolean)!is_null(config('respire'));
  }

  public static function currentExpirationType() : array
  {
    $workingTypes = [];
    $types = (array)[config("respire.password"),config("respire.token")];
    foreach($types as $type){
        if($type['status'] == true) array_push($workingTypes, $type);
    }
    return $workingTypes;
  }

  public function status() : bool
  {
    return (boolean)config("respire.password.status");
  }

}
