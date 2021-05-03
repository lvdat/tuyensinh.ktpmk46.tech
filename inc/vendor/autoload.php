<?
define('BASE', $_SERVER['DOCUMENT_ROOT']);

$path_be = array(
    'config' => BASE.'/inc/vendor/config.php',
    'header' => BASE.'/inc/vendor/header.php',
    'footer' => BASE.'/inc/vendor/footer.php',
    'function' => BASE.'/inc/vendor/function.php',
    'fb_vendor' => BASE.'/facebook/vendor/',
    'core' => BASE.'/facebook/core.php'
);

$path_fe = array(
    'main_js' => '/asset/js/main.js',
    'main_css' => '/asset/css/main.css',
    'bootstrap' => '/asset/bootstrap/',
    'bootstrap_css' => '/asset/bootstrap/dist/css/',
    'bootstrap_js' => '/asset/bootstrap/dist/js/',
    'jquery.min.js' => 'https://code.jquery.com/jquery-2.2.4.min.js'
);

session_start();
?>