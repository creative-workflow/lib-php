<?php

namespace cw\php\view\html;

class Input extends Tag{
  public function __construct($name, $value=''){
    parent::__construct('input');
    $this->setName($name)
         ->setValue($value);
  }

  public function type($type){
    return $this->setAttribute('type', $type);
  }

  public function typeText(){
    return $this->type('text');
  }

  public function typeTextAlphaNumeric(){
  return $this->setInputMode('inputmode', 'verbatim')
              ->type('text');
  }

  public function typeNumber($withoutSpinner = false){
    $this->type('number');
    if($withoutSpinner){
      $this->setInputMode('inputmode', 'numeric')
           ->addClass('without-spinner');
      // Add something like this to your sass files:
      // input.without-spinner::-webkit-outer-spin-button,
      // input.without-spinner::-webkit-inner-spin-button
      //   -webkit-appearance: none
      //   margin: 0
    }
    return $this->setAttribute('pattern', '\d*');
  }

  public function typePhone(){
    return $this->setInputMode('tel')
                ->type('tel');
  }

  public function typeEmail(){
    return $this->setInputMode('email')
                ->type('email');
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

  public function setInputMode($mode){
    return $this->setAttribute('inputmode', $mode)
                ->setAttribute('x-inputmode', $mode);
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
    return $this->setAttribute('autocompletetype', $type)
                ->setAttribute('x-autocompletetype', $type);
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
