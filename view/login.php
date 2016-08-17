<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        require_once('model/globals.php');
        echo $title;
        ?>
    </title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/normalize.css">


    <link rel="stylesheet" href="css/style.css">


</head>

<body>

<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>
    </ul>

    <div class="tab-content">
        <div id="login">
            <h1>Welcome Back!</h1>

            <form name="login" action="model/loginCheck.php" method="post">

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="emailid" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="pwd" required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>

                <button class="button button-block"/>Log In</button>

            </form>

        </div>
        <div id="signup">
            <h1>Sign Up for Free</h1>

            <form name="register" method="post">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            First Name<span class="req">*</span>
                        </label>
                        <input type="text" name="fname" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">
                        <label>
                            Last Name<span class="req">*</span>
                        </label>
                        <input type="text" name="lname" required autocomplete="off"/>
                    </div>
                </div>

                <div class="field-wrap">
                    <label>
                        UID<span class="req">*</span>
                    </label>
                    <input type="text" name="uid" maxlength="9" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="emailid" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="pwd" id="p1" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Confirm Password<span class="req">*</span>
                    </label>
                    <input type="password" name="confirmpwd" id="p2" required autocomplete="off"/>
                </div>

                <button type="submit" class="button button-block" onclick="checkpwds(this.form);"/>Get Started</button>

            </form>

        </div>
    </div><!-- tab-content -->

</div> <!-- /form -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>

<script language="JavaScript" type="text/javascript" src="js/checkpwdscript.js"></script>



</body>
</html>
