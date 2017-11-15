<?php

namespace cw\php\js\expression;

abstract class AbstractExpression implements ExpressionInterface{
  protected $trailingSemicolon='';

  public abstract function toJs();

  public function __toString(){
    return $this->toJs() . $this->trailingSemicolon;
  }

  public function stop(){
    $this->trailingSemicolon = ";\n";
    
    return $this;
  }

  public function castJsExpression($input){
    if(is_subclass_of($input, '\cw\php\js\expression\AbstractExpression'))
      return $input;

    return new Raw(''.$input);
  }

  public function toJsWrapped($i='', $o=''){
    $body = $this->toJs();
    return "(function($o) { $body })($i);";
  }
}
