<?php
respond('/', function($request) {
    $payload = array('section' => 'home');

    echo $GLOBALS['twig']->render('home.html', $payload);
});