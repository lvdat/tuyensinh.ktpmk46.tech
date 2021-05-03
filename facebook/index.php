<?
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/vendor/function.php';

if(login()){
    header("Location: /");
}
else { 
require_once $path_be['header'];
?>
    <fb:login-button 
        scope="public_profile,email"
        onlogin="checkLoginState();">
    </fb:login-button>
    <div id="status">
    </div>
<? } ?>
