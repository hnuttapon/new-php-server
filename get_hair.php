<?php
   $con = mysqli_connect('mysql-13571-0.cloudclusters.net', 'pon', '1234', 'mysqlcluster');
    if(mysqli_connect_errno()){
        echo "1: Connection failed"; //error code #1 = connection failed
        exit();
    }

    $username = $_POST["username"];
    $sql = "SELECT id FROM players WHERE username = '" . $username . "';";
    $result = $con->query($sql) or die("query failed");

    //echo "shirt:shirt";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $user_id = $row["id"];
          //echo "shirt:shirt";
        }
        $sql = "SELECT hairname FROM hair WHERE players_id = '". $user_id ."'";
        $result = $con->query($sql) or die("query failed");
        echo "hair:hair:";
        while($row = $result->fetch_assoc()) {
            echo $row["hairname"];
            echo ":";
        }
    }
    else{
        echo "fail";
    }

?>

<!-- $stmt = $mysqli->prepare("SELECT Column FROM foo");
$stmt->execute();
$array = [];
foreach ($stmt->get_result() as $row)
{
    $array[] = $row['column'];
}
print_r($array);

$result = mysql_query("SELECT names FROM Customers");
$storeArray = Array();
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $storeArray[] =  $row['names'];  
} -->
