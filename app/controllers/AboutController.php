<?php
respond('/about', function($request) {
    $payload = array('section' => 'about');

    echo $GLOBALS['twig']->render('about.html', $payload);
});