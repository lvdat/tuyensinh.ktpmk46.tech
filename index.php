<?
require_once 'inc/vendor/header.php';

require_once $path_be['function'];
require_once $path_be['core'];

echo (login()) ? 'Da dang nhap' : 'Chua dang nhap';
if(!login()){
    $fb = new Facebook\Facebook([
        'app_id' => $app_id, // Replace {app-id} with your app id
        'app_secret' => $app_key,
        'default_graph_version' => 'v2.10',
    ]);

    $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email'];
  $loginUrl = $helper->getLoginUrl('https://tuyensinh.ktpmk46.tech/facebook/', $permissions);
  echo '<a href="'.$loginUrl.'" class="btn btn-success">Đăng nhập bằng Facebook</a>';
}else{
    echo 'Xin chào '.$_SESSION['fb_id'];
}

?>