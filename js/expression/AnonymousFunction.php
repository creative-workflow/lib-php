<?php

namespace cw\php\js\expression;

class AnonymousFunction extends AbstractExpression{
  public $args;
  public $body;
  public function __construct(array $args, $body){
    $this->args = $args;
    $this->body = $body;
  }

  public function toJs(){
    $args = implode(', ', $this->args);
    return "function($args){ $this->body }$this->trailingSemicolon";
  }
}
