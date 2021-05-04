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
function getuser($fb_id){
    global $lvd;
    if(!login()) return false;
    $sql = "SELECT * FROM users WHERE fb_id = '$fb_id' LIMIT 1";
    $kq = $lvd->query($sql);
    if($kq->num_rows > 0){
        $e = mysqli_fetch_assoc($kq);
        return $e;
    }else{
        return 0;
    }
}