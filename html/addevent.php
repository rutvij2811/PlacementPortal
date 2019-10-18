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
        <meta charset=utf-8/>
        <meta name="viewport"
              content="width=device-width,height=device-height initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <title>Corporate and Industry Relations</title>
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
    <body class="blue" style="background-color: white !important;">
        <div class="container">
            <form action="../php/addeventserver.php" method="post">
                <div class="row">
                    <div class="col s12 l6 offset-l3 white-text card hoverable">
                        <div class="col s12 center">
                            <h1 class="text-center teal-text light">
                                <small>Job Details Form</small>
                            </h1>
                        </div>
                        <div class="divider"></div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">work</i>
                            <input id="company-name" name="jname" type="text" class="teal-text" required>
                            <label for="company-name">Company Name</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">attach_money</i>
                            <input id="package" name="jpackage" type="number" step="0.01" class="teal-text" required>
                            <label for="package">CTC Package in Lakhs</label>
                        </div>
                        <!--
                        <div class="row">
                            <div class="col s12">
                                <div class="col s4 teal-text gender">
                                    <div class="left">
                                        <big><i class="material-icons small">attachment</i></big>
                                    </div>
                                    <duv class="left"> &nbsp; &nbsp; Bond</duv>
                                </div>
                                <div class="col s4 center">
                                    <input id="bond_yes" name="jbond" class="with-gap" type="radio">
                                    <label for="bond_yes">Yes</label>
                                </div>
                                <div class="col s4 center">
                                    <input id="bond_no" name="jbond" checked="checked" class="with-gap" type="radio">
                                    <label for="bond_no">No</label>
                                </div>
                            </div>
                        </div>
                        !-->
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">attachment</i>
                            <input id="bond" name="jbond" type="number" step="0.01" class="teal-text" required>
                            <label for="bond">Bond in Years</label>
                        </div>

                        <div class="input-field col s12">
                            <select multiple class="teal-text" name="jbranch[]" size=4 required>
                                <option selected disabled hidden style="display:none">Choose branches eligible</option>
                                <option value="CSE">CSE</option>
                                <option value="ECE, EIE & EEE">ECE, EIE & EEE</option>
                                <option value="MECH">MECH</option>
                                <option value="MTECH">MTECH</option>
                            </select>
                            <label>Eligible Branches</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">date_range</i>
                            <input id="company-date" name="jdate" type="text" class="teal-text" required>
                            <label for="company-date">Company Interview Dates</label>
                        </div>
                        <div class="input-field col s12">
                            <p class="teal-text">Deadline</p>
                            <i class="material-icons prefix teal-text">access_time</i>
                            <input id="company-deadline" name="jdeadline" type="date" class="teal-text" required>
                            <label for="company-deadline"></label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">local_offer</i>
                            <input id="jobtype" name="jtype" type="text" class="teal-text" required>
                            <label for="jobtype">Job Type</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">message</i>
                            <textarea id="jdescription" name="jdesc" class="materialize-textarea teal-text"
                                      required></textarea>
                            <label for="jdescription">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix teal-text">insert_link</i>
                            <input id="company-url" name="jlink" type="url" class="teal-text" required>
                            <label for="company-url">Company URL</label>
                        </div>
                        <div class="col s12">&nbsp;</div>
                        <div class="col s12 center">
                            <button type="submit" name="submit" class="col s12 btn red hoverable">Submit</button>
                        </div>
                        <div class="col s12">&nbsp;</div>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>