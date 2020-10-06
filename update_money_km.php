<?php
       $con = mysqli_connect('mysql-13571-0.cloudclusters.net', 'pon', '1234', 'mysqlcluster');
        if(mysqli_connect_errno()){
            echo "1: Connection failed"; //error code #1 = connection failed
            exit();
        }
    
        $username = $_POST["username"];
        $money_km = $_POST["money_km"];

        $sql = "UPDATE players SET money_km = '" . $money_km ."' WHERE username = '" . $username ."'";
        $result = $con->query($sql) or die("query failed");
        echo "update";
?>