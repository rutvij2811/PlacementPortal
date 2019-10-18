<?php
 session_start();
if(!isset($_SESSION['cemail'])){
   header('location:login.php?sessionfailed');
}
include_once '../php/databaseconnect.php';
$cemail=$_SESSION['cemail'];
$sql="SELECT * from admin WHERE cemail='$cemail'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) != 1) {
    header('location:logout.php?sessionfailed');
    exit();
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Control Panel</title>
        <link rel="stylesheet" href="../css/cirstyle.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
                type="text/javascript"></script>
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.button-collapse').sideNav();
                $('.parallax').parallax();
                $('.collapsible').collapsible();
                $('.dropdown-trigger').dropdown();
            });
        </script>
    </head>
    <header>
        <div class="navbar-fixed">
            <nav class="yellow" role="navigation">
                <div class="nav-wrapper container">
                    <a id="logo-container" href="#splash" class="brand-logo center-block">
                        <div class="logo center-block"><img src="../images/job.png" style="padding:10px;" width="75px"/>
                        </div>
                    </a>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <button class="mdl-button mdl-js-button mdl-button--raised  white right"
                                    style="margin:10px;">About
                            </button>
                        </li>
                        <li>
                            <button class="mdl-button mdl-js-button mdl-button--raised  white right"
                                    id="quickstart-sign-in" name="signin"
                                    onclick="window.location.href='logout.php'" style="margin:10px;">Sign Out
                            </button>
                        </li>
                    </ul>
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i
                            class="material-icons">menu</i></a>
                </div>
            </nav>
        </div>
        <ul id="nav-mobile" class="side-nav">
            <li>
                <button class="mdl-button mdl-js-button white" style="width:100%;">About</button>
            </li>
            <li>
                <button class="mdl-button mdl-js-button white" id="quickstart-sign-in1" name="signin"
                        style="width:100%;" onclick="window.location.href='logout.php'">Sign Out
                </button>
            </li>

        </ul>
    </header>
    <body>
        <div class="centerer">
            <div class="wrap">
                <a class="btn-11" href="addevent.php">Add Job</a>
                <a class="btn-11" href="deleteJob.php">Delete Job</a>
                <a class="btn-11" href="cirviewevent.php">View Job</a>
                <a class="btn-11" href="addPlacedStudent.php">Add Placed Student</a>
                <a class="btn-11" href="deleteStudent.php">Delete Student</a>
                <a class="btn-11" href="viewStudent.php">See Placed Students</a>
            </div>
        </div>
    </body>
</html>