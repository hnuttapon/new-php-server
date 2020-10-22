<?php
       $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
        if(mysqli_connect_errno()){
            echo "1: Connection failed"; //error code #1 = connection failed
            exit();
        }
     
        $username = $_POST["username"];


   

        $sql = "UPDATE players SET pet_character = '2' WHERE username = '" . $username ."'";
        $result = $con->query($sql) or die("1: query failed" . mysqli_error($con));


        echo "0";
        
?>