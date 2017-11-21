<?php

namespace cw\php\view\html;

class Label extends Tag{
  public function __construct($for, $content=null){
    parent::__construct('label');
    $this->setFor($for);
    if($content !== null)
      $this->addContent($content);
  }

  public function setFor($for){
    return $this->setAttribute('for', $for);
  }
}
