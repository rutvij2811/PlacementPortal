<?php
 session_start();
if(!isset($_SESSION['semail'])){
   header('location:login.php?sessionfailed');
}
include_once '../php/databaseconnect.php';
$semail=$_SESSION['semail'];
$sql="SELECT * from student WHERE semail='$semail'";
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
        <title>User Profile</title>
        <link rel="stylesheet" href="../css/userProfile.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"
              rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
                type="text/javascript"></script>
        <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="../js/addeventapp.js"></script>
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
                            <button onclick="location.href = 'eventlist.php'"
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
                <button onclick="location.href = 'eventlist.php'" class="mdl-button mdl-js-button white"
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
        <div class="container">
            <h1>Edit Profile</h1>
            <hr>
            <div class="row">
                <!-- edit form column -->
                <div class="col-md-9 personal-info">
                    <h3>Personal info</h3>

                    <form class="form-horizontal" role="form" onsubmit="doneSubmitting2()" action="userProfile.html">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Name:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="Add Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Registration Number:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="text" placeholder="BL.EN.U4XXXYYZZZ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Branch:</label>
                            <div class="col-md-8">
                                <select id="regdep" style="min-width:60%;">
                                    <option value="CSE">CSE</option>
                                    <option value="ELEC">ECE, EIE & EEE</option>
                                    <option value="MECH">MECH</option>
                                    <option value="MTECH">MTECH</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Number of current arrear:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-8">
                                <input class="form-control" type="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Confirm password:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">CGPA:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">12th %:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">10th %:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">H/D:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Editable Resume Link:</label>
                            <div class="col-md-8">
                                <input class="form-control" type="url" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
    </body>
</html>