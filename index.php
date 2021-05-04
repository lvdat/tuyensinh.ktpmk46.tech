<?
require_once 'inc/vendor/header.php';
if(login()){
    header("Location: /update_info");
}
require_once $path_be['footer'];
?>