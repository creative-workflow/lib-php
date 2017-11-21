<?php

namespace cw\php\js\jquery;

class GetScripts extends \cw\php\js\expression\AbstractExpression{
  private $getScripts = [];
  public $divider = ',';
  public function __construct(array $urls, $callback = null){
    foreach($urls as $url)
      $this->getScripts[] = new GetScript($url, $callback);
  }

  public function toJs(){
    return implode($this->divider, $this->getScripts);
  }
}
