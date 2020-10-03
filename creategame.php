<?php
 //  $config = include('config.php');
 //  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
 $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $username = $_POST["username"];

    $insertgamequery = "INSERT INTO 'current-game' (GameName) VALUES ('" . $username . ");";
    mysqli_query($con, $insertgamequery) or die("1: Insert create game query failed"); 

    $gamecheckquery = "SELECT 'idCurrent-Game' FROM current-game WHERE GameName = '" . $username . "';";

    if ($gamecheckquery->num_rows > 0) {
        while($row = $gamecheckquery->fetch_assoc()) {
          $gameid = $row["idCurrent-Game"];
        }
    };
 
    $gamecheck = mysqli_query($con, $gamecheckquery) or die("2 :select id query failed"); 
    if(mysqli_num_rows($gamecheck) > 0){
        $insertuserquery = "INSERT INTO game (GameName,player,CG_id) VALUES ('" . $username . "' , '" . $username . "', '" . $gameid . "';";
        mysqli_query($con, $insertuserquery) or die("3: Insert Player query failed"); 
    }

    echo("0");
?>