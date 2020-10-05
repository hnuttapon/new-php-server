<?php
 //  $config = include('config.php');
 //  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
 $con = mysqli_connect('remotemysql.com', 'N2UXTZAF5N', 'QHzkYyyhkV', 'N2UXTZAF5N');
 if(mysqli_connect_errno()){
     echo "1: Connection failed"; //error code #1 = connection failed
     exit();
 }

    $username = $_POST["name"];
    $password = $_POST["password"];
    //echo $username . $password;
    //check if name exists

    $namecheckquery = "SELECT username FROM players WHERE username = '" . $username . "';";
    // //echo $namecheckquery;
    $namecheck = mysqli_query($con, $namecheckquery) or die("2 :Name check query failed"); //error code #2 - name check query failed
    // echo $namecheck;
    if(mysqli_num_rows($namecheck) > 0){
        echo "3 :Name already exists"; //error code #3 - name exist cannot register
        exit();
    }
    // //add user to the table

    $salt = "\$5\$rounds=5000\$" . "steamedhams" . $username . "\$";
    $hash = crypt($password, $salt);
    $insertuserquery = "INSERT INTO players (username,salt,hash,money_km,latitude,longitude,total_km,current_level,current_task) VALUES ('" . $username . "' , '" . $salt . "', '" . $hash . "','1000','0','0','0','1','1');";
    mysqli_query($con, $insertuserquery) or die(mysqli_error($con)); //error code #4 - Insert query failed

    echo("0");
?>