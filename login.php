<?php
  //  $config = include('config.php');
  //  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
    // $config = include('config.php');
    $con = mysqli_connect('remotemysql.com', 'N2UXTZAF5N', 'QHzkYyyhkV', 'N2UXTZAF5N');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["name"];
    $password = $_POST["password"];
    $character;
    //check if name exists
    //$namecheckquery = "SELECT * FROM players WHERE username = '" . $username . "';";
    // //echo $namecheckquery;
    //$namecheck = mysqli_query($con, $namecheckquery) or die("2 :Name check query failed"); //error code #2 - name check query failed
    // echo $namecheck;

    $sql = "SELECT * FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("1: query fail");

    $salt;
    $hash;
    $user_id;
    $money_km;
    $arr2;
    if ($result->num_rows > 0) {
        // output data of each row
        
        while($row = $result->fetch_assoc()) {
          //echo  " - Name: " . $row["username"]. ";";
          //echo $row["username"];
          $salt = $row["salt"];
          $hash = $row["hash"];
          $user_id = $row["id"];
          $money_km = $row["money_km"];
          $current_level = $row["current_level"];
          $current_task = $row["current_task"];
        //   strval($current_level);
        //   strval($current_task);

          $arr2 = str_split($loginhash, 45);
        }
    };

    $loginhash = crypt($password, $salt);

    $arr2 = str_split($loginhash, 45);

    if($hash != $arr2[0]){
        echo "6: Incorrect password"; //error code #6 - password does not hash to match table

        exit();
    }
    if($hash == $arr2[0]){
        $sql = "SELECT * FROM dressing WHERE players_id = '" . $user_id ."';";
        $result = $con->query($sql) or die("2: query fail");
        //echo $result;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $gender = $row["gender"];
            $shirtname = $row["shirtname"];
            $shortname = $row["shortname"];
            $shoename = $row["shoename"];
            $hairname = $row["hairname"];
            echo "dress" . ":" . $gender . ":" . $shirtname . ":" . $shortname . ":" . $shoename . ":" . $hairname . ":" . $money_km . ":" . $current_level .":" . $current_task;  
            }
        }
        else if ($result->num_rows == 0){
            echo "gender_not_exist";
        }
        else{
            echo "2";
        }
    }

?>