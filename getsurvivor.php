<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $gamename = $_POST["gamename"];

    $sql = "SELECT * FROM game WHERE GameName = '" . $gamename ."' AND role = 2";
    $result = $con->query($sql) or die("1: query failed" .mysqli_connect($con));
    echo "location:";
    while($row = $result->fetch_assoc()) {
        echo $row["latitude"];
        echo ":";
        echo $row["longitude"];
        echo ":";
        echo $row["player"];
        echo ":";
    }

?>

