
<? require_once 'autoload.php'; ?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title><?=(isset($title)) ? $title : 'Trang CFS về các ngành học của Khoa CNTT và TT trường DHCT'?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Le Van Dat">
        <meta name="description" content="<?=(isset($description)) ? $description : 'Trang CFS về các ngành học của Khoa CNTT và TT trường DHCT. Giúp các bạn muốn vào DHCT có thể hiểu hơn về chương trình đào tạo của trường, xác định đúng mục tiêu!'?>" />

        <link rel="stylesheet" href="<?=$path_fe['bootstrap_css'].'bootstrap.min.css'?>" />
        <link rel="stylesheet" href="<?=$path_fe['main_css']?>" />

        <script type="text/javascript" src="<?=$path_fe['bootstrap_js'].'bootstrap.min.js'?>"></script>
        <script type="text/javascript" src="<?=$path_fe['jquery.min.js']?>"></script>
        <script type="text/javascript" src="<?=$path_fe['main_js']?>"></script>
    </head>

    <body>
