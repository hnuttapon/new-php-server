<?php
        $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
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