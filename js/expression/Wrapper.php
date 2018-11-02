<?php

namespace cw\php\js\expression;

class Wrapper extends AbstractExpression{
  public $js = [];
  public function __construct($js=''){
    $this->js[]= $js;
  }

  public function append($input){
    $this->js = array_merge($this->js, (array)$input);

    return $this;
  }

  public function toJs(){
    $js = implode(';', $this->js);
    return "<script type='text/javascript'>\n /* <![CDATA[ */ \n $js $this->trailingSemicolon \n /* ]]> */</script>";
  }
}
