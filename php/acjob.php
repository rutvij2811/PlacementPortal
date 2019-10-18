<?php
 include_once 'databaseconnect.php';
 $sql="SELECT b.jname,b.jpackage FROM job b";
 $result=mysqli_query($conn,$sql);
 if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $rows = array();
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $rows[] = $row;
    }
}
echo json_encode($rows);