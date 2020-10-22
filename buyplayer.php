<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $money_km = $_POST["money_km"];
    $player = $_POST["player"];

    $sql = "UPDATE players SET money_km = '" . $money_km ."' WHERE username = '" . $username ."'";
    $result = $con->query($sql) or die("1: query failed" . mysqli_error($con));

    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("2: query failed");
    $user_id;


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
        }
        $sql = "INSERT INTO human (human_character,players_id) VALUES ('". $player ."','". $user_id ."');";
        $result = $con->query($sql) or die("3: query failed" . mysqli_error($con));
        echo "0";
    }
    else{
        echo "fail";
        exit();
    }


?>