<?php
    $con = mysqli_connect('eu-cdbr-west-03.cleardb.net', 'bf00e4ec332952', '96cb1300', 'heroku_e2c4947f07c47f2');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }


    $sql = "SELECT GameName FROM currentgame";
    $result = $con->query($sql) or die("query failed");
    echo "GameName:";
    echo $result->num_rows . ":";
    while($row = $result->fetch_assoc()) {
        echo $row["GameName"];
        echo ":";
    }

?>

