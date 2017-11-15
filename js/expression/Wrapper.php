<?php

namespace cw\php\js\expression;

class Wrapper extends AbstractExpression{
  public $js;
  public function __construct($js){
    $this->js = $js;
  }

  public function toJs(){
    return "<script type='text/javascript'>\n /* <![CDATA[ */ \n $this->js $this->trailingSemicolon \n /* ]]> */</script>";
  }
}
