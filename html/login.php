<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset=utf-8/>
        <meta name="viewport"
              content="width=device-width,height=device-height initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
        <title>Corporate and Industry Relations</title>
        <link href='https://fonts.googleapis.com/css?family=Oswald|Montserrat:400,700|Cabin:500' rel='stylesheet'
              type='text/css'>
        <link rel="stylesheet" href="../css/loginstyle.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="../js/loginapp.js"></script>
    </head>

    <body>
        <div class='poster'></div>
        <div class='central badge' id='logmodule'>
            <div class='start'>
                <img src='../images/job.png' width='100'>
                <div class='back' onclick='document.getElementById("logmodule").className = "central badge"'
                     style="color:blue;">Back to Login
                </div>
            </div>
            <div class='ribbon' onclick='document.getElementById("logmodule").className = "central badge signup"'
                 style="color:blue;">Need an account? Click here.
            </div>
            <h1 style="color:blue;">Amrita CIR</h1>
            <h2 style="color:blue;">
                Placement News Portal
                <form id="form1" action="../php/regroute.php" method="POST">
                    <input id='regname' placeholder='Username' name="sname" type='text' required>
                    <input id='regno' placeholder='ID Card No' name="sregno" type='text' required>
                    <input id='regpass' placeholder='Password' name="spwd" type='password' required>
                    <input id='regpass2' placeholder='Confirm Password' name="scpwd" type='password' required>
                    <input id='regemail' placeholder='Email' name="semail" type='email' required>
                    <select id="regdep" name="sdepid" style="min-width:60%;">
                        <option value="1">CSE</option>
                        <option value="2">ECE, EIE & EEE</option>
                        <option value="3">MECH</option>
                        <option value="4">MTECH</option>
                    </select>
                    <a href='' style="color:blue;">Terms and Conditions</a>
                    <div class='roundel register'>
                        <button name="submit" type="submit">Reg</button>
                        <!-- <input style="background-color:#ef3038;width:10px;" type="submit" name="submit" value="Login"> -->
                        <!--                    <a href="#">Log In</a>-->
                    </div>
                    <!-- <input style="background-color:#ef3038;" type="submit" name="submit" value="Register"> -->
                </form>
            </h2>
            <div class='end' style="color:blue;">
                <form id="form2" action="../php/loginroute.php" method="POST">
                    <input id='username' name="email" placeholder='Username' type='email' required>
                    <input id='password' name="pwd" placeholder='Password' type='password' required>
                    <div class='roundel login'>
                        <button name="submit" type="submit">Login</button>
                        <!-- <input style="background-color:#ef3038;width:10px;" type="submit" name="submit" value="Login"> -->
                        <!--                    <a href="#">Log In</a>-->
                    </div>
                </form>
            </div>
        </div>

    </body>

</html>