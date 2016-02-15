## Setup
you can open core/Config.php and change provided config or add your own default config vars.

## Controller
just a little
```php
class Foo extends Controller
```
and you're ready to go!
save the file as `foo.php` in the `controllers` directory

## Model
```php
class Foo extends Model
```
the file goes into `models` direcotory with the name of `foo.php`

## View
Here's the thing, you can have two types of views, a `layout` or a `content` template.
to set the layout, use `$this->view->setLayout($layout_name)` in the controller's function.
and add the content view `$this->view->setContent($content)`
to use no layout, use `$this->view->noLayout()`
and to show the view, use `$this->view->show()`

you can also set the layout and the content when calling `show()` method.
`$this->view->show($content, $layout)`


## That's it!
well, what you expect from me? If you want something more fancy, go get [Codeigniter](https://codeigniter.com) or [Laravel](https://laravel.com) or something else.
