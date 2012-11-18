<?php
/*
 * situla: use good practices and be "rewarded"
 * * * * * * * * * * * * * * * * * * * * * * * *
 * LOL SITULA
 */

require_once(LIB_DIR . 'URI.php');
require_once(LIB_DIR . 'Twig/Autoloader.php');

/* Start da session
 * * * * * * * * * * * * * * * * * * * * * * * */
session_start();

/* Setup da views
 * * * * * * * * * * * * * * * * * * * * * * * */
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
$twig = new Twig_Environment($loader, array(
    'cache' => CACHE_DIR
));

/* Get it on
 * * * * * * * * * * * * * * * * * * * * * * * */
$router = new Router();
$router->setBasePath('/');

foreach (glob(CONTROLLERS_DIR . '*.php') as $controller)
{
    require_once($controller);
}

include(APP_DIR . 'Routes.php');

$match = $router->match();

print_r($match);