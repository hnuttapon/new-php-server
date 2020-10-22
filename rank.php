<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $sql = "SELECT * FROM players ORDER BY total_km DESC";
    $result = $con->query($sql) or die("query failed");
    echo "rank:";
    while($row = $result->fetch_assoc()) {
        echo $row["username"];
        echo ":";
    }

?>

