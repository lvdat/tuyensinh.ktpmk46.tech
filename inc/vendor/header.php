<?
require_once 'autoload.php'; 
require_once $path_be['function'];
require_once $path_be['core'];
if(!login()){
    $fb = new Facebook\Facebook([
        'app_id' => $app_id, // Replace {app-id} with your app id
        'app_secret' => $app_key,
        'default_graph_version' => 'v2.10',
    ]);
    $helper = $fb->getRedirectLoginHelper();
  $permissions = ['email'];
  $loginUrl = $helper->getLoginUrl('https://tuyensinh.ktpmk46.tech/facebook/', $permissions);
}else{
    $user = getuser($_SESSION['fb_id']);
    $complete = ($user['type'] != 0) ? true : false;
}
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title><?=(isset($title)) ? $title : 'Trang CFS về các ngành học của Khoa CNTT và TT trường DHCT'?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Le Van Dat">
        <meta name="description" content="<?=(isset($description)) ? $description : 'Trang CFS về các ngành học của Khoa CNTT và TT trường DHCT. Giúp các bạn muốn vào DHCT có thể hiểu hơn về chương trình đào tạo của trường, xác định đúng mục tiêu!'?>" />

        <link rel="stylesheet" href="<?=$path_fe['bootstrap_css'].'bootstrap.min.css'?>" />
        <link rel="stylesheet" href="<?=$path_fe['main_css'].'?v='.time()?>" />

        <script type="text/javascript" src="<?=$path_fe['bootstrap_js'].'bootstrap.min.js'?>"></script>
        <script type="text/javascript" src="<?=$path_fe['jquery.min.js']?>"></script>
        <script type="text/javascript" src="<?=$path_fe['main_js'].'?v='.time()?>"></script>
                <script type="text/javascript" src="/asset/js/notify.js?v=<?=time()?>"></script>
        <script src="https://kit.fontawesome.com/d9b1f21fbb.js" crossorigin="anonymous"></script>
    </head>

    <body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="/">
              <img src="https://ktpmk46.tech/asset/image/logo.png" alt="" width="30" class="d-inline-block align-text-top">
              <b>CTU TuyenSinh CFS</b>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-question-circle"></i> Góc Hỏi - Đáp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-edit"></i> Góc Review</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <? if(login()) : ?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://graph.facebook.com/<?=$user['fb_id']?>/picture?type=square" alt="" width="24" class="d-inline-block align-text-top" style="border-radius:50%">
                            <?=$user['name']?>
                        </a>
                        <ul class="dropdown-menu animate slideIn shadow" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/dangxuat">Đăng xuất</a></li>
                        </ul>
                    </li>
                <? else : ?>
                    <li class="nav-item"><a href="<?=$loginUrl?>" title="Đăng nhập với Facebook" class="nav-link text-primary"><i class="fab fa-facebook"></i> Đăng nhập với Facebook</a></li>
                <? endif ?>
            </ul>
            </div>
        </div>
    </nav>
    
    <div class="container-md animate slideIn">
        <div class="row d-flex justify-content-center" id="maintxt">
            <div class="col-md-5">