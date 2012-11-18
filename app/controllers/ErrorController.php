<?php
respond('404', function ($request) {
    $payload = array('section' => 'error',
        'title' => '404');

    echo $GLOBALS['twig']->render('404.html', $payload);
});