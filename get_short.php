<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("query failed");


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
  
        }
        $sql = "SELECT shortname FROM short WHERE players_id = '". $user_id ."'";
        $result = $con->query($sql) or die("query failed");
        echo "short:short:";
        while($row = $result->fetch_assoc()) {
            echo $row["shortname"];
            echo ":";
        }
    }
    else{
        echo "fail";
    }

?>


