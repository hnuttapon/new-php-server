<?php
  $config = include('config.php');
  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
  $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $username = $_POST["username"];
    $gamename = $_POST["gamename"];

    if($username == $gamename){
        $deletegamequery = "DELETE FROM currentgame WHERE GameName = $gamename;";
    }
    


 


    echo("0");
?>
