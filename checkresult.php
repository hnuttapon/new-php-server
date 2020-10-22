<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $survivor = $_POST["survivor"];
    $sql = "SELECT * FROM game WHERE player = '" . $survivor ."' ";
    $result = $con->query($sql) or die("1: query failed" .mysqli_connect($con));
    while($row = $result->fetch_assoc()) {
        echo strval($row["role"]);
    }

 

?>