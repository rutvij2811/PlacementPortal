<?php
 session_start();
 print_r($_POST);
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
    $jname = $_POST['jname'];
    $sql="DELETE FROM job WHERE jname = '$jname';";
    // print_r($sql);
    if(mysqli_query($conn, $sql)) // will return true if succefull else it will return false
    {
        echo "<script type='text/javascript'>alert('Job Alert Deleted');window.location.href='../html/deletejob.php?deleteJob=Success'</script>";
        exit();
    }
    echo "<script type='text/javascript'>alert('Failed.Try Again');window.location.href='../html/deletejob.php?deleteJob=Failed'</script>";
    exit();
}
else
{
	header("Location: ../html/login.php");
	exit();
}