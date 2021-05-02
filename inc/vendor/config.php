<?
// database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tuyensinh';
$port = '3306';

/* -- */

$lvd = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_set_charset($conn, 'UTF8');
if(!$lvd){
    echo 'Error while connecting to Database, please wait a minute';
    exit();
}
?>