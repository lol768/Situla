<?php
respond('404', function ($request) {
    $payload = array('section' => 'error');

    echo $GLOBALS['twig']->render('404.html', $payload);
});