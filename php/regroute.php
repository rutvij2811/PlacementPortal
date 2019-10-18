<?php
session_start();
if(isset($_POST['submit']))
{
    include_once 'databaseconnect.php';
    $sname=mysqli_real_escape_string($conn,$_POST['sname']);
    $sregno=mysqli_real_escape_string($conn,$_POST['sregno']);
    $semail=mysqli_real_escape_string($conn,$_POST['semail']);
    $spwd=$_POST['spwd'];
    $scpwd=$_POST['scpwd'];
    $sdepid=mysqli_real_escape_string($conn,$_POST['sdepid']);
   
    //Error Handlers
    if(!preg_match("/^[a-zA-Z ]*$/", $sname)){
         header("Location: ../html/login.php?signup=InvalidName");
	     exit();
    }
    else if(strcmp($spwd, $scpwd) !== 0){
        header("Location: ../html/login.php?signup=InvalidPassword");
	    exit();
    }
    else if(!filter_var($semail, FILTER_VALIDATE_EMAIL)){
         header("Location: ../html/login.php?signup=InvalidEmail");
	     exit();
    }
    else{
    	$sql="SELECT * FROM student WHERE semail='$semail'";
    	$result=mysqli_query($conn,$sql);
    	$resultCheck=mysqli_num_rows($result);
    	if($resultCheck>0){
    		header("Location: ../html/login.php?emailreigsteredalready");
    		exit();
    	}
    }
   
    $hashpwd=password_hash($spwd, PASSWORD_DEFAULT);
    $sql="INSERT INTO student (sname, sregno, semail, spwd, sdepid) VALUES ('$sname', '$sregno','$semail', '$hashpwd', '$sdepid');";
    mysqli_query($conn, $sql);
    header("Location: ../html/login.php?signup=Success");
    exit();
}
else
{
	header("Location: ../html/login.php?signup=fail");
	exit();
}