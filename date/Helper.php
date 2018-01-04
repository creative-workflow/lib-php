<?php

namespace cw\php\date;

class Helper{
  public function endOfDay($date=null){
    if($date === null)
      $date = new \DateTime();

    $endOfDay = $date->format('Y-m-d 23:59:59');

    return \DateTime::createFromFormat('Y-m-d H:i:s', $endOfDay);
  }

  public function beginningOfDay($date=null){
    if($date === null)
      $date = new \DateTime();

    $beginningOfDay = $date->format('Y-m-d 00:00:00');

    return \DateTime::createFromFormat('Y-m-d H:i:s', $beginningOfDay);
  }
}
