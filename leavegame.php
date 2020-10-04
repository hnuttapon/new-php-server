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
        mysqli_query($con, $deletegamequery) or die("delete game query failed " . mysqli_error($con)); 
    }
    else if($username != $gamename){

        $gamecheckquery = "SELECT * FROM currentgame WHERE GameName = '" . $gamename . "';";
        $gamecheck = mysqli_query($con, $gamecheckquery) or die("2 :select totalplayer query failed" . mysqli_error($con));
        
        if ($gamecheck->num_rows > 0) {
            while($row = $gamecheck->fetch_assoc()) {
              $totalplayer = $row["TotalPlayer"];
            }
            if($totalplayer == 1){
                $deletegamequery = "DELETE FROM currentgame WHERE GameName = $gamename;";
                mysqli_query($con, $deletegamequery) or die("delete game query failed " . mysqli_error($con)); 
            }
            else{
                $deletequery = "DELETE FROM game WHERE player = $username;";
                mysqli_query($con, $deletequery) or die("delete query failed " . mysqli_error($con)); 

                $totalplayer = $totalplayer - 1;
                $sql = "UPDATE currentgame SET TotalPlayer = $totalplayer WHERE GameName = '" . $gamename ."'";
                $result = $con->query($sql) or die("update total player failed" . mysqli_error($con));
            }
        };

        



    }
    


 


    echo("0");
?>
