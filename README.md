# mia-slider-expressive

# Instalación servicios
Abrir routes.php e insertar:
```php
/** SLIDER **/
$app->route('/slider/list', [\Mobileia\Slider\Handler\ListHandler::class], ['GET', 'POST'], 'slider.list');
$app->route('/slider/click', [\Mobileia\Slider\Handler\ClickHandler::class], ['GET', 'POST'], 'slider.click');
$app->route('/slider/save', [\Mobileia\Expressive\Auth\Handler\AuthHandler::class, new Mobileia\Expressive\Auth\Middleware\MiaRoleAuthMiddleware([\Mobileia\Expressive\Auth\Model\MIAUser::ROLE_ADMIN]), \Mobileia\Slider\Handler\SaveHandler::class], ['GET', 'POST'], 'slider.save');
```