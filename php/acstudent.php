<?php
 include_once 'databaseconnect.php';
 $sql="SELECT a.sname,a.sregno FROM student a";
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