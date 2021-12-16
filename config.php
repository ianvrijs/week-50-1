<?php
if(!defined('ROOT_URL')) {
    define('ROOT_URL', 'http://localhost/php/jaar%203/week-50-1/');
}

if(!defined('ROOT_PATH')) {
    define('ROOT_PATH', __DIR__);
}

$sHost = 'localhost';
$sDatabaseName = 'week-50';
$sDatabaseUser = 'root';
$sPassword = '';

if(!defined('DB_HOST')) {
    define('DB_HOST', $sHost);
}
if(!defined('DB_NAME')) {
    define('DB_NAME', $sDatabaseName);
}
if(!defined('DB_USER')) {
    define('DB_USER', $sDatabaseUser);
}
if(!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', $sPassword);
}
?>