
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
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                appId      : '1165592283892911',
                cookie     : true,
                xfbml      : true,
                version    : 'v10.0'
                });
                
                FB.AppEvents.logPageView();   
                
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/vi_VN/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
            function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
                console.log('statusChangeCallback');
                console.log(response);                   // The current login status of the person.
                if (response.status === 'connected') {   // Logged into your webpage and Facebook.
                testAPI();  
                } else {                                 // Not logged into your webpage or we are unable to tell.
                document.getElementById('status').innerHTML = 'Please log ' +
                    'into this webpage.';
                }
            }


            function checkLoginState() {               // Called when a person is finished with the Login Button.
                FB.getLoginStatus(function(response) {   // See the onlogin handler
                statusChangeCallback(response);
                });
            }
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
            function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/facebook', function(response) {
                    console.log(response.name + '---'+response.email);
                document.getElementById('status').innerHTML =
                    'Thanks for logging in, ' + response.name + '!, access Token: ' + response.accessToken;
                });
            }
        </script>
