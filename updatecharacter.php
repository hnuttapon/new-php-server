<?php

   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $shirt = $_POST["shirt"];
    $short = $_POST["short"];
    $hair = $_POST["hair"];
    $shoe = $_POST["shoe"];

    // $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    // $result = $con->query($sql) or die("1: query failed" . mysqli_error($con));
    // $user_id;

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //       $user_id = $row["id"];
    //     }
    //     $sql = "INSERT INTO human (char,players_id) VALUES ('". $player ."','". $user_id ."');";
    //     $result = $con->query($sql) or die("3: query failed");
    //     echo "0";
    // }
    // else{
    //     echo "fail";
    //     exit();
    // }

    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("2: query failed");
    $user_id;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
        }
        $sql = "INSERT INTO dressing (shirtname,shortname,shoename,hairname,gender,players_id) VALUES ('". $shirt . "','". $short . "','". $shoe . "','". $hair . "','". $gender . "','".  $user_id . "');";
        $result = $con->query($sql) or die("2: query failed" . mysqli_error($con));

        $sql = "INSERT INTO human (human_character,players_id) VALUES ('". $gender ."','". $user_id ."');";
        $result = $con->query($sql) or die("3: query failed" . mysqli_error($con));
        echo "update";
    };


?>