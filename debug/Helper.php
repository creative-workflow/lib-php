<?php

namespace cw\php\debug;

class Helper{
  public static $localIpSPaces = [
    '0.0.0.0',
    '127.0.0.1',
    '192.168.',
    '172.'
  ];

  public static function isLocalhost(){
    $ip = self::ip();
    foreach(self::$localIpSPaces as $ipRange)
      if(strpos($ip, $ipRange) !== false)
        return true;

    return false;
  }

  public static function ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
      return $_SERVER['HTTP_CLIENT_IP'];

    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];

    return $_SERVER['REMOTE_ADDR'];
  }

  public static function dump($input, $andDie = true){
    if($andDie)
      echo '<pre>';

    var_dump($input);

    if($andDie)
      die();
  }
}
