<?php
       $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
        if(mysqli_connect_errno()){
            echo "1: Connection failed"; //error code #1 = connection failed
            exit();
        }
     
        $username = $_POST["username"];
        $total_km = (int)$_POST["total_km"];

        $sql = "UPDATE players SET total_km =  $total_km WHERE username = '" . $username ."'";
        $result = $con->query($sql) or die("query failed" );
        echo "update";
?>