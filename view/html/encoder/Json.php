<?php

namespace cw\php\view\html\encoder;

class Json{
  public static function encode($input){
    return json_encode($input, JSON_UNESCAPED_UNICODE |
                               JSON_UNESCAPED_SLASHES |
                               JSON_NUMERIC_CHECK);
  }
}
