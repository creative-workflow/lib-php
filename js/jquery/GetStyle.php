<?php

namespace cw\php\js\jquery;

class GetStyle extends \cw\php\js\expression\AbstractExpression{
  private $url;
  private $callback;

  public function __construct($url){
    $this->url = $url;
  }

  public function toJs(){
    return "jQuery('head').append('<link href=\"$this->url\" rel=\"stylesheet\" type=\"text/css\">')";
  }
}
