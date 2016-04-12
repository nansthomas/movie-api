<?php
session_start();

// Config
include 'config/options.php';
// include 'config/database.php';

// use App\Facebook\FacebookConnect;
//
// require 'vendor/autoload.php';
//
// session_start();
//
// $appId = '1703544296582819';
// $appSecret = '841701dd4b9b535e585993653976e086';
// $connect = new FacebookConnect($appId, $appSecret);
// $user = $connect->connect(URL);
//
// if (is_string($user)) {
//   echo "<a href='$user'>Se coco avec Fb</a>";
// } else {
//   var_dump($user);
// }

// // Force a SESSION right now, because FB connect don't work, to delete when FB Connect work
// // USER 1
// $_SESSION['user_id']    = 1;
// $_SESSION['first_name']  = 'Mickael';
// // USER 2
// // $_SESSION['user_id']    = 2;
// // $_SESSION['first_name']  = 'Jung-Um';

require './vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '1703544296582819',
  'app_secret' => '841701dd4b9b535e585993653976e086',
  'default_graph_version' => 'v2.4',
  ]);
$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; // optional

try {
    if (isset($_SESSION['facebook_access_token'])) {
        $accessToken = $_SESSION['facebook_access_token'];
    } else {
        $accessToken = $helper->getAccessToken();
    }
} catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
 }
if (isset($accessToken)) {
    if (isset($_SESSION['facebook_access_token'])) {
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    } else {
        // getting short-lived access token
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        // OAuth 2.0 client handler
        $oAuth2Client = $fb->getOAuth2Client();
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        // setting default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    // redirect the user back to the same page if it has "code" GET variable
    if (isset($_GET['code'])) {
        header('Location: ./');
    }
    // getting basic info about user
    try {
        $profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
        $profile = $profile_request->getGraphNode()->asArray();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // redirecting user back to app login page
        header("Location: ./");
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    // printing $profile array on the screen which holds the basic info about user
    //print_r($profile);
    echo $profile['email'];
    // Now you can redirect to another page and use the access token from $_SESSION['facebook_access_token']
} else {
    // replace your website URL same as added in the developers.facebook.com/apps e.g. if you used http instead of https and you used non-www version or www version of your website then you must add the same here
    $loginUrl = $helper->getLoginUrl('http://localhost:8888/', $permissions);
    echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
}

// Get the query
$q = empty($_GET['q']) ? '' : $_GET['q'];

// Routes
if($q == '')
	$page = 'home';
else if($q == 'login')
	$page = 'login';
else if($q == 'login-callback')
	$page = 'login-callback';
else if($q == 'explore')
	$page = 'explore';
else if($q == 'seance')
	$page = 'seance';
else if($q == 'dashboard')
	$page = 'dashboard';
else if($q == 'creation')
	$page = 'creation';
else
	$page = '404';

// Includes
include 'controllers/'.$page.'.php';
include 'views/partials/html-top.php';
include 'views/partials/nav.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/footer.php';
include 'views/partials/html-bottom.php';
