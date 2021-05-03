<?
$host = 'localhost';
$user = 'levandat_admin';
$pass = 'Dat@@0962992956';
$db = 'levandat_cfs';
$port = '3306';

$lvd = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_set_charset($lvd, 'UTF8');
if(!$lvd){
    echo 'Có lỗi kết nối CSDL';
    exit();
}
// Time Zone
date_default_timezone_set('Asia/Ho_Chi_Minh');

//Facebook Auth
$app_id = '1165592283892911';
$app_key = 'e83b22bd0557c0746f309f24f249c752';
?>