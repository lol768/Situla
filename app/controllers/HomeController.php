<?php
respond('/', function($request) {
    $payload = array('section' => 'home',
        'title' => 'Home');

    echo Situla::twig->render('home.html', $payload);
});