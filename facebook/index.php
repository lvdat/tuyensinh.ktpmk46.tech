<?
require_once 'core.php';
 session_start();
$fb = new Facebook\Facebook([
  'app_id' => $app_id, // Replace {app-id} with your app id
  'app_secret' => $app_key,
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

try {
    $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}


try {
      // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
$fb_id = $user['id'];
$name = $user['name'];
$email = $user['email'];
$sql = "SELECT * FROM users WHERE fb_id = '$fb_id' LIMIT 1";
if ($lvd->query($sql)->num_rows > 0) {
      $_SESSION['fb_id'] = $fb_id;
      header('Location: /'); exit;
} else {
  $sql1 = "INSERT INTO users (fb_id, name, mail) VALUES ('$fb_id', '$name', '$email')";
  if ($lvd->query($sql1)) {
      $_SESSION['fb_id'] = $fb_id;
      header('Location: /'); exit;
  } else {
      exit('Có lỗi khi thêm người dùng, vui lòng đăng nhập lại!');
  }
}
?>