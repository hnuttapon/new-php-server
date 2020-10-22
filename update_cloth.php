<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $shirt = $_POST["shirt"];
    $short = $_POST["short"];
    $hair = $_POST["hair"];
    $shoe = $_POST["shoe"];

    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("query failed");
    $user_id;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
        }
        $sql = "UPDATE dressing SET shirtname = '" . $shirt ."' , shortname = '" . $short ."' , hairname = '" . $hair ."', shoename = '" . $shoe ."' WHERE players_id = '" . $user_id ."'";
        $result = $con->query($sql) or die("query failed");
        echo "update";
    }
    else{
        echo "fail";
        exit();
    }


?>