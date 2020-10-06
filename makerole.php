<?php
  $con = mysqli_connect('mysql-13571-0.cloudclusters.net', 'pon', '1234', 'mysqlcluster');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $survivor = $_POST["survivor"];
    $hunter1 = $_POST["hunter1"];
    $hunter2 = $_POST["hunter2"];
    $hunter3 = $_POST["hunter3"];

    $sql = "UPDATE game SET role = 2 WHERE player = '" . $survivor ."'";
    $result = $con->query($sql) or die("1: " . mysqli_error($con));

    $sql = "UPDATE game SET role = 1 WHERE player = '" . $hunter1 ."'";
    $result = $con->query($sql) or die("2: " . mysqli_error($con));

    $sql = "UPDATE game SET role = 1 WHERE player = '" . $hunter2 ."'";
    $result = $con->query($sql) or die("3: " . mysqli_error($con));

    $sql = "UPDATE game SET role = 1 WHERE player = '" . $hunter3 ."'";
    $result = $con->query($sql) or die("4: " . mysqli_error($con));

    echo("0");
?>
