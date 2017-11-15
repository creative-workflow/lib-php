<?php

namespace cw\php\core\traits;

trait Singleton {
  protected static $_instance = null;

  public static function getInstance(){
    if (null === self::$_instance)
      self::$_instance = new self;

    return self::$_instance;
  }

  // avoid instanciating
  protected function __clone() {}

  protected function __construct() {}
}
