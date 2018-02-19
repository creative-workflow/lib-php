<?php

namespace cw\php\core;

class ArrayAsObject extends \ArrayObject implements \ArrayAccess{
  public function __construct($input = []){
    parent::__construct($input, \ArrayObject::STD_PROP_LIST |
                                \ArrayObject::ARRAY_AS_PROPS);
  }

  public function toArray(){
    return $this->getArrayCopy();
  }
}
