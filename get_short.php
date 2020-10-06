<?php
   $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
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


