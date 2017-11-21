# creative-workflow/lib-php

### Setup
```
git submodule add https://github.com/creative-workflow/lib-php.git ./wordpress/wp-content/themes/child/lib/cw/php
```


### Core
  * Singleton-Trait
  * Autoloader (namespaces or snakecase)
  * ArrayAsObject (properties and array_* methods)

### js
Do something like this:

```
<?

$jQuery = \cw\php\js\jQuery::getInstance();

$jQuery->when(
  $jQuery->getScript('...'),
  $jQuery->getScript('...'),
  $jQuery->getScript('...')  
)
->then(
  $jQuery->anonymousFunction([],
    $jQuery->select('a.fancybox')
           ->chain('fancybox()')
           ->chain('animate({opacity: 1})')
           ->stop()
  )
)
->stop();

//output generated js code
echo $jQuery->toJsWrapped();
```

### view/Html
Do something like this:

```
use \cw\php\view\Html;

$html = Html::getInstance()

echo $html->tag('div', ['class' => 'logo-wrapper'])
          ->append(
            $html->image('...', ['class' => 'logo'])
      );


echo $html->script(
        $jQuery->select('a.fancybox')
               ->chain('fancybox()')
               ->chain('animate({opacity: 1})')
               ->stop()
      );

...

```

### view/html/Tag - Label - Input
Do something like this:

```
$labelTag = new Label('zip_code');
$labelTag->addContent('Zip-Code: ');

$inputTag = new Input('zip_code');
$inputTag->typeNumber()
         ->setId('zip_code')
         ->setPlaceholder('Your Zip-Code')
         ->setRequired()
         ->setAutoCompleteType('postal-code')
         ->setAndForceMaxLength(5);

return (new Tag())->addClass('row')
                  ->addContent($labelTag)
                  ->addContent($inputTag);
```
