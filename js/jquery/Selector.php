<?php

namespace cw\php\js\expression\jquery;

class Selector extends \cw\php\js\expression\AbstractExpression{
  protected $chain = [];
  public function __construct($selector, $context = null){
    $this->selector = $selector;
    $this->context  = $context;
  }

  public function chain($input){
    array_push($this->chain, $input);
  }

  public function toJs(){
    if(!$this->context)
      $start = "jQuery('$this->selector')";
    else
      $start = "jQuery('$this->selector', $this->context)";

    if(!$this->chain)
      return $start;

    $chain = implode('.', $this->chain);

    return "$start.$chain $this->trailingSemicolon";
  }
}
