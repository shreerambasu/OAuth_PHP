<?php
// set error function 
function errors($msg){
    $response = [];
    $response['success']= false;
    $response['message'] = $msg;
    return json_encode($response);
}

// start session
session_start();

// check access token is empty or not
if(empty($_SESSION['my_access_token'])){
    echo 'Return back to access token from beginning <a href="http://localhost:80/user/index.php">Go Back</a>';
    die(errors("Error: Invalid Access TOken "));       
}else {
    //store access token
    $acccessToken = $_SESSION['my_access_token'];
    // target api which will be call.
    $URL = 'https://api.github.com/user';
    // token header 
    $authHeader = "Authorization: token " . $acccessToken;
    $userHeader = "User-Agent: myapp";
    echo $authHeader. '<br>';

    // curl request to access api
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', $authHeader, $userHeader));
    $response = curl_exec($ch);
    

    var_dump($response);
    echo '<br>';
    var_dump($ch);
    curl_close($ch);
    $data = json_decode($response);

    echo json_encode($data);
}



?>