<?php
       $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
        if(mysqli_connect_errno()){
            echo "1: Connection failed"; //error code #1 = connection failed
            exit();
        }
    
        $username = $_POST["username"];
        $current_level = $_POST["current_level"];
        $current_task = $_POST["current_task"];

        $sql = "UPDATE players SET current_level = '" . $current_level ."' , current_task = '" . $current_task ."' WHERE username = '" . $username ."'";
        $result = $con->query($sql) or die("query failed");
        echo("complete");
?>