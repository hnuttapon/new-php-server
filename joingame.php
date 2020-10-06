<?php

$con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $username = $_POST["username"];
    $gamename = $_POST["gamename"];
    //echo $username;  
    
    //echo $gamename;

    $playercheck = "SELECT player FROM game WHERE player = '" . $username . "';";
    $check = mysqli_query($con, $playercheck) or die("1 :select player query failed");
    if ($check->num_rows > 0) {
        die("already join" . mysql_error($con));
    };
    
    $gamecheckquery = "SELECT * FROM currentgame WHERE GameName = '" . $gamename . "';";
    $gamecheck = mysqli_query($con, $gamecheckquery) or die("2 :select totalplayer query failed");
    
    if ($gamecheck->num_rows > 0) {
        while($row = $gamecheck->fetch_assoc()) {
          $gameid = $row["idCG"];
          $totalplayer = $row["TotalPlayer"];
          if($totalplayer == 4){
              die("full");
          }
        }
    };

    $totalplayer = $totalplayer + 1;

    $gameid= (int)$gameid ;
    $insertuserquery = "INSERT INTO game (GameName,player,CG_id) VALUES ('" . $gamename . "' , '" . $username . "',  $gameid );";
    mysqli_query($con, $insertuserquery) or die("Insert game query failed " . mysqli_error($con)); 

    $sql = "UPDATE currentgame SET TotalPlayer = $totalplayer WHERE GameName = '" . $gamename ."'";
    $result = $con->query($sql) or die("update total player failed");

    echo("0");
?>
