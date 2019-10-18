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
    $jname = $_POST['jname'];	$jpackage = $_POST['jpackage'];     $jbranch = implode(', ', $_POST['jbranch']);
    $jbond = $_POST['jbond'];	$jdesc = $_POST['jdesc'];	$jlink = $_POST['jlink'];	
    $jtype = $_POST['jtype'];	$jdate = $_POST['jdate'];	$jdeadline = $_POST['jdeadline']; 
    $sql="INSERT INTO job (	jname, jpackage, jbranch, jbond, jdesc, jlink, jtype, jdate, jdeadline) 
    VALUES ('$jname', '$jpackage', '$jbranch', '$jbond', '$jdesc', '$jlink', '$jtype', '$jdate', '$jdeadline');";
    // print_r($sql);
    if(mysqli_query($conn, $sql)) // will return true if succefull else it will return false
    {
        echo "<script type='text/javascript'>alert('Job Alert Added');window.location.href='../html/addevent.php?addJob=Success'</script>";
        exit();
    }
    echo "<script type='text/javascript'>alert('Failed.Try Again');window.location.href='../html/addevent.php?addJob=Failed'</script>";
    exit();
}
else
{
	header("Location: ../html/login.php");
	exit();
}