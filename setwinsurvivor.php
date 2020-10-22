<?php
  $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $gamename = $_POST["gamename"];

    $sql = "UPDATE game SET role = 4 WHERE GameName = '" . $gamename ."' AND role = 2";
    $result = $con->query($sql) or die("1: " . mysqli_error($con));
    
    echo("0");
?>
