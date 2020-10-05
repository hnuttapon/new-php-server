<?php
//   $config = include('config.php');
//   $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
  $con = mysqli_connect('remotemysql.com', 'N2UXTZAF5N', 'QHzkYyyhkV', 'N2UXTZAF5N');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $username = $_POST["username"];
    $gamename = $_POST["gamename"];

    if($username == $gamename){
        $deletegamequery = "DELETE FROM currentgame WHERE GameName = '" . $gamename . "';";
        mysqli_query($con, $deletegamequery) or die("1: " . mysqli_error($con)); 
    }
    else if($username != $gamename){

        $gamecheckquery = "SELECT * FROM currentgame WHERE GameName = '" . $gamename . "';";
        $gamecheck = mysqli_query($con, $gamecheckquery) or die("2: " . mysqli_error($con));
        
        if ($gamecheck->num_rows > 0) {
            while($row = $gamecheck->fetch_assoc()) {
              $totalplayer = $row["TotalPlayer"];
            }
            if($totalplayer == 1){
                $deletegamequery = "DELETE FROM currentgame WHERE GameName = '" . $gamename . "';";
                mysqli_query($con, $deletegamequery) or die("3: delete game query failed " . mysqli_error($con)); 
            }
            else{
                $deletequery = "DELETE FROM game WHERE player = '" . $username . "';";
                mysqli_query($con, $deletequery) or die("4: delete query failed " . mysqli_error($con)); 

                $totalplayer = $totalplayer - 1;
                $sql = "UPDATE currentgame SET TotalPlayer = $totalplayer WHERE GameName = '" . $gamename ."'";
                $result = $con->query($sql) or die("5: update total player failed" . mysqli_error($con));
            }
        };

        



    }
    


 


    echo("0");
?>
