<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }


    $gamename = $_POST["gamename"];
    $sql = "SELECT player FROM game WHERE GameName = '" . $gamename . "'";
    $result = $con->query($sql) or die("query failed");
    echo "player:";
    echo $result->num_rows . ":";
    while($row = $result->fetch_assoc()) {
        echo $row["player"];
        echo ":";
    }

?>

