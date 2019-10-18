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
        <title>Add Placed Student</title>
        <link rel="stylesheet" href="../css/deleteStyle.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
                type="text/javascript"></script>
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!-- <link rel="stylesheet" href="css/adminstyle.css"> -->
        <link rel="stylesheet"
              href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <!--<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="../js/homeapp.js"></script>

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
                            <button onclick="location.href = 'ciradmin.php'"
                                    class="mdl-button mdl-js-button mdl-button--raised  white right"
                                    style="margin:10px;">Home
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
                <button onclick="location.href = 'ciradmin.php'" class="mdl-button mdl-js-button white"
                        style="width:100%;">Home
                </button>
            </li>
            <li>
                <button class="mdl-button mdl-js-button white" id="quickstart-sign-in1" name="signin"
                        style="width:100%;" onclick="window.location.href='logout.php'">Sign Out
                </button>
            </li>

        </ul>
    </header>
    <body>
        <div class="central">
            <form method="POST" action="../php/placedroute.php">
                <div class="inner-form">
                    <label>Enter the student name: </label><br>
                    <input id="sname" name="sname" type="text" placeholder="Student Name" list="students" autocomplete="off" required>
                    <datalist id="students"></datalist>
                    <br>
                    <label>Enter student's job: </label><br>
			        <input id="jname" name="jname" type="text" placeholder="Job Name" autocomplete="off" list="jobs" required>
        	        <datalist id="jobs"></datalist>
                    <button name="submit" type="submit">Add Student Job</button>
                </div>
            </form>
        </div>


        <script type="text/javascript">
		$(document).ready(function() {
			var events = [];
			var a = [];
			$.ajax({
				url: '../php/acjob.php',
				async: false,
				success: function(data) {
					a = data;
				}
			});
			a = JSON.parse(a);
			Object.keys(a).forEach(function(key) {
				events.push('<option value="' + a[key]["jname"] + '">' + a[key]["jname"] + "[" + a[key]["jpackage"] + "]" + '</option>');
			});
			$('#jobs').html(events.join(''));
            var events = [];
			var a = [];
			$.ajax({
				url: '../php/acstudent.php',
				async: false,
				success: function(data) {
					a = data;
				}
			});
			a = JSON.parse(a);
			Object.keys(a).forEach(function(key) {
				events.push('<option value="' + a[key]["sname"] + '">' + a[key]["sname"] + "[" + a[key]["sregno"] + "]" + '</option>');
			});
			$('#students').html(events.join(''));
		});
	    </script>

    </body>
</html>