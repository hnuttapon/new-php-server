<?php
    $con = mysqli_connect('remotemysql.com', 'N2UXTZAF5N', 'QHzkYyyhkV', 'N2UXTZAF5N');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }


    $gamename = $_POST["gamename"];
    $sql = "SELECT player FROM game WHERE GameName = '" . $gamename . "'";
    $result = $con->query($sql) or die("query failed");
    echo "player:";
    echo $result->num_rows . ":";
    while($row = $result->fetch_assoc()) {
        echo $row["player"];
        echo ":";
    }

?>

