<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'config.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'libraries' . DIRECTORY_SEPARATOR . 'autoload.php');

database::init(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);

$sHtmlNav = require_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'nav.php');
$sHtmlFooter = require_once(__DIR__ . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php');



if (isset($_GET['module']) && !empty($_GET['module']))
{
    $sFilepath = __DIR__ . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR . $_GET['module'] . DIRECTORY_SEPARATOR;
}
else
{
    header('Location: index.php?module=login');
}

$sHtmlBody = include($sFilepath . "index.php");


$oHtml = new html();
$oHtml->addCss('style.css');
$oHtml->setTitle('Mijn framework pagina');
$oHtml->addHtml($sHtmlNav);
$oHtml->addHtml($sHtmlBody);
$oHtml->addHtml($sHtmlFooter);

//echo
$oHtml->doOutput();
?>