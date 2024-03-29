<?php
 session_start();
if(!isset($_SESSION['semail'])){
   header('location:login.php?sessionfailed');
}
include_once '../php/databaseconnect.php';
$semail=$_SESSION['semail'];
$sql="SELECT * from student a,department d WHERE semail='$semail' AND a.sdepid=d.did";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) != 1) {
    header('location:logout.php?sessionfailed');
    exit();
}
$row=mysqli_fetch_assoc($result);
$dname=$row['dname'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Event List</title>
        <meta name="viewport"
              content="width=device-width,height=device-height initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <link href='https://fonts.googleapis.com/css?family=Oswald|Montserrat:400,700|Cabin:500' rel='stylesheet'
              type='text/css'>
        <link rel="stylesheet" href="../css/eventliststyle.css">

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
        <script type="text/javascript">
            var dname='<?php echo $dname;?>';
        </script>
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
                            <button onclick="location.href = 'userProfile.php'"
                                    class="mdl-button mdl-js-button mdl-button--raised  white right"
                                    style="margin:10px;">User Profile
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
                <button onclick="location.href = 'userProfile.php'" class="mdl-button mdl-js-button white"
                        style="width:100%;">User Profile
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
        <div class="calendar" id="events">
            <h1>Event Calendar</h1>
        </div>
    </body>
</html>