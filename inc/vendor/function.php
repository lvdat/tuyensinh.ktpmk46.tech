<?
// Gọi Autoload (chứa toàn bộ đường dẫn)
require_once 'autoload.php';
// Lấy dữ liệu CONFIG
require_once $path_be['config'];

function login(){
    global $lvd;
    if(isset($_SESSION['fb_id'])){
        $id = $_SESSION['fb_id'];
        $sql = "SELECT * FROM users WHERE fb_id = '$id'";
        if($lvd->query($sql)->num_rows > 0){
            return true;
        }else{
            session_destroy();
            return false;
        }
    }else return false;
}