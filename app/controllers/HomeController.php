<?php
respond('/', function($request) {
    $payload = array('section' => 'home',
        'title' => 'Home');

    echo $GLOBALS['twig']->render('home.html', $payload);
});