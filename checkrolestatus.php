<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }


    $username = $_POST["username"];
    $sql = "SELECT role FROM game WHERE player = '" . $username . "'";
    $result = $con->query($sql) or die("query failed" . mysql_error($con));
    while($row = $result->fetch_assoc()) {
        echo $row["role"];
    }
?>

