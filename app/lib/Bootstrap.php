<?php
/*
 * situla: use good practices and be "rewarded"
 * * * * * * * * * * * * * * * * * * * * * * * *
 * LOL SITULA
 */

require_once(LIB_DIR . 'klein.php');
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
respond('/[:name]', function ($request) {
    echo 'Hello ' . $request->name;
});

foreach (glob(CONTROLLERS_DIR . '*.php') as $controller)
{
    require_once($controller);
}

dispatch();