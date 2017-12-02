<?php

namespace cw\php\core;

class Autoloader{
  public static function registerNamespaceLoader(){
    $paths = func_get_args();

    spl_autoload_register(function ($className) use($paths){
      $fileName = str_replace('\\', '/', $className).'.php';

      foreach($paths as $path){
        $filePath = $path . '/' . $fileName;
        if(file_exists($filePath))
          include $filePath;
      }
    });
  }


  public static function registerCwBowerNamespaceLoader(){
    $paths = func_get_args();

    spl_autoload_register(function ($className) use($paths){
      if(strpos($className, 'cw') === false)
        return ;

      $fileName = str_replace('\\', '/', $className);
      $fileName = str_replace('cw/wp', 'cw/wordpress', $fileName);
      $fileName = str_replace('cw/', 'creative-workflow.', $fileName).'.php';

      foreach($paths as $path){
        $filePath = $path . '/' . $fileName;

        if(file_exists($filePath))
          include $filePath;
      }
    });
  }


  public static function registerSnakecaseLoader(){
    $paths = func_get_args();

    spl_autoload_register(function ($className) use($paths){
      $fileName = str_replace('_', '/', $className).'.php';

      foreach($paths as $path){
        $filePath = $path . '/' . $fileName;
        if(file_exists($filePath))
          include $filePath;
      }
    });
  }
}
