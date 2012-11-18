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
class Situla
{
    public static $twig;

    private function __construct {}
}

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem(VIEWS_DIR);
Situla::twig = new Twig_Environment($loader, array(
    'cache' => CACHE_DIR
));

require_once(LIB_DIR . 'Helpers.php');

/* Get it on
 * * * * * * * * * * * * * * * * * * * * * * * */
foreach (glob(CONTROLLERS_DIR . '*.php') as $controller)
{
    require_once($controller);
}

dispatch();