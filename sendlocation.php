<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
   if(mysqli_connect_errno()){
       echo "1: Connection failed"; //error code #1 = connection failed
       exit();
   }
    $username = $_POST["username"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
  

    $sql = "UPDATE game SET latitude = '" . $latitude ."' , longitude = '" . $longitude ."'  WHERE player = '" . $username ."';";
    mysqli_query($con, $sql) or die("3: Insert game query failed " . mysqli_error($con)); 

    echo("0");
?>