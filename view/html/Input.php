<?php

namespace cw\php\view\html;

class Input extends Tag{
  public function __construct($name, $value=''){
    parent::__construct('input');
    $this->setName($name);
    $this->setValue($value);
  }

  public function type($type){
    return $this->setAttribute('type', $type);
  }

  public function typeText(){
    return $this->type('text');
  }

  // https://stackoverflow.com/questions/14447668/input-type-number-is-not-showing-a-number-keypad-on-ios
  public function typeNumber(){
    $this->type('number');
    return $this->setAttribute('pattern', '\d*');
  }

  public function typePhone(){
    return $this->type('tel');
  }

  public function typeEmail(){
    return $this->type('email');
  }

  public function typeHidden(){
    return $this->type('hidden');
  }

  public function typePassword(){
    return $this->type('password');
  }

  public function typeFile(){
    return $this->type('file');
  }

  public function setValue($value){
    return $this->setAttribute('value', $value);
  }

  public function setName($name){
    return $this->setAttribute('name', $name);
  }

  public function setPlaceholder($placeholder){
    return $this->setAttribute('placeholder', $placeholder);
  }

  public function setAutoCompleteType($type){
    $this->setAttribute('autocompletetype', $type);
    $this->setAttribute('x-autocompletetype', $type);
    return $this;
  }

  public function setMaxLength($maxLength){
    return $this->setAttribute('maxlength', $maxLength);
  }

  public function setAndForceMaxLength($maxLength){
    $this->setOnInput("javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);");
    return $this->setMaxLength($maxLength);
  }

  public function setRequired($required='required'){
    if($required)
      $this->setAttribute('aria-required', 'true');

    return $this->setAttribute('required', $required);
  }

  public function setOnInput($content){
    return $this->setAttribute('oninput', $content);
  }
}
