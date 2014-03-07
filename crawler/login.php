<?php

require 'facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '207971189363447',
  'secret' => 'fb6d16e9852c7a5d29e00998202b6113',
));

// Get User ID3
//$facebook->setAccessToken("CAAAAAYsX7TsBANaik0CwDhN7ZCTG6OMjj2ip9R9z7wI4pfbbq68yrOfsj16tjyQZAtW31LqPfZBfHqUjesfwdlU69uy56OuCh4NWPJ7VqoLhZAZCxKfjLPmGDIxRkqAqh7fHswPZCsuDkKN0CSBpFYxq1eXVpwEZBWPhV4E5NRsNgdU7ZCVR7S3v");
$user_id="inj3ct0r";
 if($user_id) {

      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {

        $user_profile = $facebook->api('/me','GET');
        echo "Name: " . $user_profile['name'];

      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl(); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, print a link for the user to login
      $login_url = $facebook->getLoginUrl();
      echo 'Please <a href="' . $login_url . '">login.</a>';

    }
?>