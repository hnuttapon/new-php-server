<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $shoe_name = $_POST["shoe_name"];

    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("query failed");
    $user_id;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
        }
        $sql = "INSERT INTO shoe (shoename,players_id) VALUES ('". $shoe_name ."','". $user_id ."');";
        $result = $con->query($sql) or die("query failed");
        echo "Complete";
    }
    else{
        echo "fail";
        exit();
    }


?>