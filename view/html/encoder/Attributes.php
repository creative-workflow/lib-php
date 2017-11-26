<?php

namespace cw\php\view\html\encoder;

class Attributes{
  public static function encode($input){
    if(!is_array($input))
      return $input;

    // transform data array into data-$key = $value
    if(isset($input['data']) && is_array($input['data'])){
      foreach($input['data'] as $dataKey => $dataValue)
        $input["data-$dataKey"] = $dataValue;

      unset($input['data']);
    }

    $tmp = [];
    foreach($input as $key => $value){
      if(is_array($value))
        $value = Json::encode($value);

      $value = self::encodeValue($value);
      $tmp[] = $key . '="' . $value . '"';
    }

    return implode(' ', $tmp);
  }

  public static function encodeDataArray($input){
    return self::encode(['data' => $input]);
  }

  public static function encodeValue($value){
    return self::escapeDoubleQuotes(
      self::tranformHtmlSpecialChars($value)
    );
  }

  public static function escapeDoubleQuotes($input){
    return addcslashes($input, '"');
  }

  public static function tranformHtmlSpecialChars($input){
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
  }
}
