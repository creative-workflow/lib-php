<?php

namespace cw\php\js\jquery;

class GetScript extends \cw\php\js\expression\AbstractExpression{
  public function __construct($url, $callback = null){
    $this->url = $url;
    if($callback)
      $this->callback = $this->castJsExpression($callback);
  }

  public function toJs(){
    if(!$this->callback)
      return "jQuery.getScript('$this->url')$this->trailingSemicolon";

    return "jQuery.getScript('$this->url', $this->callback)$this->trailingSemicolon";
  }
}
