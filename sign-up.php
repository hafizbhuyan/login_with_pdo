<?php include('sign-up-script.php'); ?>

<!DOCTYPE html>

<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/login-signup.css">
        <script src="https://kit.fontawesome.com/4aef0441eb.js" crossorigin="anonymous"></script>
        <title>Drivense | Register</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="left">
                <div id="signin">
                    <div class="logo">
                        <img src="img/DRIVENSE image.png">
                    </div>
                    <form action="sign-up-script.php" method="POST">
                        <div id="alert_msg">
                            <?php if(isset($_SESSION["error_msg"])) { echo $_SESSION["error_msg"]; session_destroy(); } ?>
                        </div>
                        <div>
                            <label>Email</label>
                            <input name="email" type="email" class="text-input">
                        </div>
                        <div>
                            <label>Password</label>
                            <input name="password" type="password" class="text-input">
                        </div>
                        <button name="sign-up-user" type="submit" class="primary-btn">Sign Up</button>
                    </form>
                    <div class="links">
                        <a href="#">Forgot Password</a>
                    </div>
                    <div class="or">
                        <hr class="bar">
                        <span>OR</span>
                        <hr class="bar">
                    </div>
                    <a href="/log-in.php" class="secondary-btn">Log In</a>
                </div>
                <footer id="main-footer">
                    <p>Copyright &copy; 2020, Drivense All Rights Reserved</p>
                    <div>
                        <a href="#">Terms of Use</a>
                        <a href="#">Privacy Policy</a>
                    </div>
                </footer>
            </div>

            <div id="right">
                <div id="showcase">
                    <div class="showcase-content">
                        <h1 class="showcase-text">
                            Start Reading
                        </h1>
                        <a href="/register.php" class="secondary-btn">Start a FREE 14-day trial</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>