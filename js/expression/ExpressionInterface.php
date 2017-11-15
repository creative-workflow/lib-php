<?php

namespace cw\php\js\expression;

interface ExpressionInterface{
  public function toJs();

  public function __toString();
}
