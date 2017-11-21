<?php

namespace cw\php\view\html;

interface TagInterface{
  public function toHtml();

  public function __toString();

  public function setId($id);

  public function addClass($class);

  public function setAttribute($name, $value);

  public function setAttributes(array $attributes);

  public function addContent($content);
}
