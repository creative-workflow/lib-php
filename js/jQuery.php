<?

namespace cw\php\js;

class jQuery extends expression\AbstractExpression{
  use \cw\php\core\traits\Singleton;

  protected $onReady = [];

  public function when(){
    $args = func_get_args();

    return new jquery\When(...$args);
  }

  public function select($selector, $context){
    return new jquery\Selector($selector, $context);
  }

  public function getScript($url, $callback = null){
    return new jquery\GetScript($url, $callback);
  }

  public function getScripts(){
    $urls = func_get_args();
    return new jquery\GetScripts($urls, $callback);
  }

  public function anonymousFunction(array $args, $body){
    return new jquery\AnonymousFunction($args, $body);
  }

  public function onReady(){
    $args = func_get_args();

    $this->onReady = array_merge($this->onReady, $args);

    return $this;
  }

  // implement
  public function toJs(){
    return implode('; ', $this->onReady);
  }

  // override
  public function toJsWrapped(){
    return parent::toJsWrapped('$', 'jQuery');
  }
}
