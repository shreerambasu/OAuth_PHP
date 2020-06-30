<?php 
    session_start();
    $acccessToken = "";
    if(isset($_SESSION['my_access_token'])){
        $acccessToken = $_SESSION['my_access_token'];
    }
    

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  <?php 
    echo '<p> Access Token: </p>';
    echo '<p><code>'. $acccessToken . '</code></p>';
    echo '<br>';
    if($acccessToken!=""){
        echo '<p>Logged In </p>';
    }else {
        echo '<p><a href="https://github.com/login/oauth/authorize?client_id=f1bd99225ab9b65c91fa" >Sign in with Github</a></p>';
    }
  ?>
  </body>
</html>