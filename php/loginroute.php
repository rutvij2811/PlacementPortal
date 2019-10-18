<?php
session_start();
// print_r($_POST);
if(isset($_POST['submit']))
{   

    include_once 'databaseconnect.php';
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
     	header("Location:../html/login.php?login=InvalidEmail");
     	exit();
    }
    $sql="SELECT * FROM admin WHERE cemail ='$email'";
    $result=mysqli_query($conn,$sql);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>0){
        $sql="SELECT * FROM admin WHERE cemail ='$email'";
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        if($resultCheck<1){
            header("Location: ../html/login.php?login=IncorrectCredentialsAdmin");
           exit();
        }
        else if($row=mysqli_fetch_assoc($result)){
            if($pwd!=$row['cpwd']){
                 header("Location:../html/login.php?login=IncorrectCredentialsAdmin");
                 exit();
             }
        else{
            $_SESSION['cemail']=$row['cemail'];
            header("Location:../html/ciradmin.php");
            exit(); 
        }
        }
    }
    else{
    	$sql="SELECT * FROM student WHERE semail ='$email'";
    	$result=mysqli_query($conn,$sql);
    	$resultCheck=mysqli_num_rows($result);
    	if($resultCheck<1){
	        header("Location:../html/login.php?login=IncorrectCredentials");
	       exit();
    	}
    	else if($row=mysqli_fetch_assoc($result)){
    		$hashedPwdCheck=password_verify($pwd,$row['spwd']);
    		if($hashedPwdCheck==false){
    			header("Location:../html/login.php?login=IncorrectCredentials");
	            exit();
	         }
	        else if($hashedPwdCheck==true){
	            $_SESSION['semail']=$row['semail'];
                header("Location:../html/eventList.php");
                exit();
	        }
        }
    	
    }
}
else
{
	header("Location: ../html/login.php");
	exit();
}