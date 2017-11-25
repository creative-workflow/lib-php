<?php

namespace cw\php\core;

class ObjectAsArray extends \ArrayObject{
  public function __construct($input = []){
    // convert nested objects to array
    $input = json_decode(json_encode($input), true);

    parent::__construct($input, \ArrayObject::STD_PROP_LIST |
                                \ArrayObject::ARRAY_AS_PROPS);
  }
}
