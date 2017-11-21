<?php

namespace cw\php\view\html;

class Tag implements TagInterface{
  use traits\Html;

  public $tag;
  public $options=['class' => []];
  public $content=[];

  public function __construct($tag='div'){
    $this->tag = $tag;
  }

  public function addClass($class){
    $this->options['class'][] = $class;
    return $this;
  }

  public function setId($id){
    return $this->setAttribute('id', $id);
  }

  public function setAttribute($name, $value){
    $this->options[$name]=$value;
    return $this;
  }

  public function setAttributes(array $attributes){
    foreach($attributes as $key => $value)
      $this->setAttribute($key, $value);

    return $this;
  }

  public function addContent($content){
    $this->content[]=$content;
    return $this;
  }

  public function toHtml(){
    return $this->tag($this->tag, implode('', $this->content), $this->options);
  }

  public function __toString(){
    return $this->toHtml();
  }
}
