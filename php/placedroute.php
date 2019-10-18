<?php
 session_start();
if(!isset($_SESSION['cemail'])){
   header('location:../html/login.php?sessionfailed');
}
include_once 'databaseconnect.php';
$cemail=$_SESSION['cemail'];
$sql="SELECT * from admin WHERE cemail='$cemail'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) != 1) {
    header('location:../html/logout.php?sessionfailed');
    exit();
}
if(isset($_POST['submit']))
{   
    // print_r($_POST);
    $jname = $_POST['jname']; $sname = $_POST['sname'];
    $sql="UPDATE student SET splaced = '$jname' WHERE sname = '$sname';";
    // print_r($sql);
    if(mysqli_query($conn, $sql)) // will return true if succefull else it will return false
    {
        echo "<script type='text/javascript'>alert('Student Placement Updated');window.location.href='../html/addPlacedStudent.php?addPlacedStudent=Success'</script>";
        exit();
    }
    echo "<script type='text/javascript'>alert('Failed.Try Again');window.location.href='../html/addPlacedStudent.php?addPlacedStudent=Failed'</script>";
    exit();
}
else
{
	header("Location: ../html/login.php");
	exit();
}
