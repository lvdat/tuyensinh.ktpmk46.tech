<?
session_start();

require_once 'inc/vendor/function.php';

if(login()){
    session_destroy();
}
header("Location: /"); exit();