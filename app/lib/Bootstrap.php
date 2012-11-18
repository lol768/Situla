<?php
/*
 * situla: use good practices and be "rewarded"
 * * * * * * * * * * * * * * * * * * * * * * * *
 * LOL SITULA
 */

require_once(LIB_DIR . 'URI.php');

$uriManager = new URI();

$segments = $uriManager->$segments;

echo "You requested {$segments}";