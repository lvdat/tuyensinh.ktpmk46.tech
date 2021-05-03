<?
// Gọi Autoload (chứa toàn bộ đường dẫn)
require_once 'autoload.php';
// Lấy dữ liệu CONFIG
require_once $path_be['config'];

function login(){
    global $lvd;
    if(isset($_SESSION['logged'])){
        $id = $_SESSION['logged'];
        $sql = "SELECT * FROM user WHERE id = '$id'";
        return ($lvd->query($sql)->num_rows > 0);
    }else return false;
}
