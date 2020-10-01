<?php
    $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
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

    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("query failed");
    $user_id;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
        }
        $sql = "INSERT INTO dressing (shirtname,shortname,shoename,hairname,gender,players_id) VALUES ('". $shirt . "','". $short . "','". $shoe . "','". $hair . "','". $gender . "','".  $user_id . "');";
        $result = $con->query($sql) or die("query failed");
        echo "update";
    };


?>