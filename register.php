<?php
 //  $config = include('config.php');
 //  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
 $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
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
    $insertuserquery = "INSERT INTO players (username,salt,hash,money_km,latitude,longitude,total_km,current_level,current_task,role,Game_id) VALUES ('" . $username . "' , '" . $salt . "', '" . $hash . "','1000','0','0','0','1','1','0',200);";
    mysqli_query($con, $insertuserquery) or die("4: Insert Player query failed"); //error code #4 - Insert query failed

    echo("0");
?>