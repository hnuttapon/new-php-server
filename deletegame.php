<?php
//   $config = include('config.php');
//   $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
$con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; 
     exit();
 }

    $gamename = $_POST["gamename"];

        $deletegamequery = "DELETE FROM currentgame WHERE GameName = '" . $gamename . "';";
        mysqli_query($con, $deletegamequery) or die("1: " . mysqli_error($con)); 
    
    


 


    echo("0");
?>
