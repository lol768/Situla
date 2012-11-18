<?php

$twig->addFunction('logged_in', new Twig_Function_Function('loggedIn'));
function loggedIn()
{
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'])
    {
        $name = $_SESSION['username'];
        $alerts = $_SESSION['alerts'];

        return array('name' => $name,
            'alerts' => $alerts);
    } else
    {
        return false;
    }
}