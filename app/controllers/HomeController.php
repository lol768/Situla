<?php
respond('/', function($request) {
    $payload = array('section' => 'home',
        'title' => 'Home');

    echo $twig->render('home.html', $payload);
});