<?php
  $con = mysqli_connect('mysql-13571-0.cloudclusters.net', 'pon', '1234', 'mysqlcluster');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $username = $_POST["username"];
    //echo $username;
    $insertgamequery = "INSERT INTO currentgame (GameName,TotalPlayer) VALUES ('" . $username . "',1);";
    mysqli_query($con, $insertgamequery) or die("1: Insert create game query failed" . mysqli_error($con)); 

    $gamecheckquery = "SELECT idCG FROM currentgame WHERE GameName = '" . $username . "';";
    $gamecheck = mysqli_query($con, $gamecheckquery) or die("2 :select id query failed"); 

    if ($gamecheck->num_rows > 0) {
        while($row = $gamecheck->fetch_assoc()) {
          $gameid = $row["idCG"];
          
        }
    };
    $gameid= (int)$gameid ;


 
    if(mysqli_num_rows($gamecheck) > 0){
        $insertuserquery = "INSERT INTO game (GameName,player,CG_id) VALUES ('" . $username . "' , '" . $username . "',  $gameid );";
        mysqli_query($con, $insertuserquery) or die("3: Insert game query failed " . mysqli_error($con)); 
    }

    echo("0");
?>
