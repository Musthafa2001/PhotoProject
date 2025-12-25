<?php
/****************************************************
 * CONFIG
 ****************************************************/
// 
$client_id     = "YOUR_CLIENT_ID";
$client_secret = "YOUR_CLIENT_SECRET";
$redirect_uri  = "http://localhost/oauth.php";  // This file
$auth_url      = "https://provider.com/oauth/authorize";
$token_url     = "https://provider.com/oauth/token";
$scope         = "profile email";

/****************************************************
 * STEP 1: Redirect user to OAuth provider
 ****************************************************/
if (!isset($_GET['code'])) {

    // Build authorization URL
    $params = http_build_query([
        "response_type" => "code",
        "client_id"     => $client_id,
        "redirect_uri"  => $redirect_uri,
        "scope"         => $scope,
        "state"         => bin2hex(random_bytes(8))
    ]);

    $login_url = $auth_url . "?" . $params;

    echo "<a href='$login_url'>Login with OAuth</a>";
    exit;
}

/****************************************************
 * STEP 2: Exchange authorization code for access token
 ****************************************************/
if (isset($_GET['code'])) {

    $code = $_GET['code'];

    $ch = curl_init($token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        "grant_type"    => "authorization_code",
        "code"          => $code,
        "redirect_uri"  => $redirect_uri,
        "client_id"     => $client_id,
        "client_secret" => $client_secret
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $token = json_decode($response, true);

    echo "<h3>Access Token Response:</h3>";
    echo "<pre>" . print_r($token, true) . "</pre>";

    // If the provider has a user info endpoint, call it
    if (isset($token['access_token'])) {
        $access_token = $token['access_token'];

        // Example user info call (change URL for your provider)
        $user_info_url = "https://provider.com/oauth/userinfo";

        $ch = curl_init($user_info_url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer $access_token"
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $userinfo = curl_exec($ch);
        curl_close($ch);

        echo "<h3>User Info:</h3>";
        echo "<pre>$userinfo</pre>";
    }
}
?>
