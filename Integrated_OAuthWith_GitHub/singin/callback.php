<?php 
    //code=42988fe599561dbf23ff
    $code = $_GET['code'];
    if(empty($code)){
        header("localhost: http://localhost:80/user/index.php");
        exit;
    }

    $CLIENT_ID = 'f1bd99225ab9b65c91fa';
    $CLIENT_SECRET = '84a8f341694dfc8ae766779364710566abce2fce';

    $URL = 'https://github.com/login/oauth/access_token';
    // POST https://github.com/login/oauth/access_token
    // client_secret, client_id, authorize_code

    // TO get Access Token
    $postParams = [
        'client_id' => $CLIENT_ID,
        'client_secret' => $CLIENT_SECRET,
        'code' => $code

    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    $response = curl_exec($ch);
    curl_close($ch);

    //var_dump($response);
    $data = json_decode($response);

    echo '<br>';
    echo "hello";
    // Store Token
    if(!empty($data->access_token)){
        session_start();
        $_SESSION['my_access_token']= $data->access_token;
        header("location: http://localhost:80/user/index.php");
        exit;
    }else{
        echo $data->error_description;
        echo '</br>';
        echo '<a href="http://localhost:80/user/index.php">Go Back</a>';
    }
