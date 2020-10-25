<?php
  //  $config = include('config.php');
  //  $con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['databasename']);
    // $config = include('config.php');
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net:13572', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["name"];

    $character;
    //check if name exists
    //$namecheckquery = "SELECT * FROM players WHERE username = '" . $username . "';";
    // //echo $namecheckquery;
    //$namecheck = mysqli_query($con, $namecheckquery) or die("2 :Name check query failed"); //error code #2 - name check query failed
    // echo $namecheck;

    $sql = "SELECT * FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("1: query fail" . mysqli_error($con));
    $user_id;
    $money_km;
    $arr2;
    if ($result->num_rows > 0) {
        // output data of each row
        
        while($row = $result->fetch_assoc()) {
          //echo  " - Name: " . $row["username"]. ";";
          //echo $row["username"];
          $user_id = $row["id"];
          $money_km = $row["money_km"];
          $total_km = strval($row["total_km"]);
          $current_level = $row["current_level"];
          $current_task = $row["current_task"];
          $pet_character = $row["pet_character"];
          $current_value = strval($row["currenthealth"]);
        //   strval($current_level);
        //   strval($current_task);

        
        }
    };


        $sql = "SELECT * FROM dressing WHERE players_id =  $user_id ;";
        $result = $con->query($sql) or die("2: query fail" . mysqli_error($con));
        //echo $result;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $gender = $row["gender"];
            $shirtname = $row["shirtname"];
            $shortname = $row["shortname"];
            $shoename = $row["shoename"];
            $hairname = $row["hairname"];
            echo "dress" . ":" . $gender . ":" . $shirtname . ":" . $shortname . ":" . $shoename . ":" . $hairname . ":" . $money_km . ":" . $current_level .":" . $current_task . ":" . $pet_character . ":" . $total_km . ":" . $current_value;  
            }
        }
        else if ($result->num_rows == 0){
            // $sql = "INSERT INTO pet (players_id) VALUES ($user_id);";
            // $result = $con->query($sql) or die("3: query failed" . mysqli_error($con));
            echo "gender_not_exist";
        }
        else{
            echo "2";
        }
    

?>