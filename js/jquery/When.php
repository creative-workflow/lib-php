<?php

namespace cw\php\js\jquery;

class When extends \cw\php\js\expression\AbstractExpression{
  public $whenStore = [];
  public $thenStore = [];

  public function __construct(){
    $args = func_get_args();

    if(func_num_args())
      call_user_func_array([$this, 'when'], $args);
  }

  public function when(){
    $args = func_get_args();

    $this->whenStore = array_merge($this->whenStore, $args);

    return $this;
  }

  public function then($then){
    $args = func_get_args();

    $this->thenStore = array_merge($this->thenStore, $args);

    return $this;
  }

  public function toJs(){
    $when     = implode(', ', $this->whenStore);

    $thenBody = implode('; ', $this->thenStore);
    $then     = new \cw\php\js\expression\AnonymousFunction([], $thenBody);

    return "jQuery.when($when).then($then)$this->trailingSemicolon";
  }
}
