<?php


$username = $email = $password = "";
$username_err = $email_err = $password_err = "";

if (!empty($_POST)) {
    // username vailidate 
    if (empty($_POST['username'])) {
        $username_err = "You need to enter your username";
    } elseif (strlen($_POST['username'] < 6)) {
        $username_err = "Your username should be at least 6 character";
    } else {
        $username = $_POST['username'];
    }

    // username email

    if (empty($_POST['email'])) {
        $email_err = "You need to enter your email id";
    } elseif (strlen($_POST['email'] < 6)) {
        $email_err = "Your email should be at least 6 character";
    } elseif (!(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) ? FALSE : TRUE) {
        $email_err = "Your email is not look like real one";
    } else {
        $email = $_POST['email'];
    }

    // password vailidate 
    if (empty($_POST['password'])) {
        $password_err = "You need to enter your username";
    } elseif (strlen($_POST['password'] < 6)) {
        $password_err = "Your password should be at least 6 character";
    } else {
        $password = $_POST['password'];
    }

    // if not error then proceed next 

    if (empty($username_err) && empty($email_err) && empty($password_err)) {

        $conn = new mysqli("localhost", "root", "", "mypro");
        if ($conn->connect_error) die("Oops something went worng Please try again later! " . $conn->connect_error);
        $sql = "INSERT INTO data (username, email, `PASSWORD`) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql)) {
            echo "<script>alert('New record created successfully')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } 
    else {
        echo "<script>alert('you have somthing error')</script>";
    }
}




?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - RedStore </title>
    <link rel="stylesheet" href="e-commerce.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .errorForm {
            font-size: 10px;
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="./e-commerce.html"> <img src="./logo.png" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="account.php">Account</a></li>
                </ul>
            </nav>
            <a href="./shoping-cart.html"> <img src="./cart.png" width="30px" height="30px"></a>
            <img src="./menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <!-- account-page -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="./image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Register</span>
                            <hr id="Indicator">
                        </div>
                        <form id="loginform" method="POST" action="account.php">
                            <input type="text" placeholder="Username" name="username" required>
                            <input type="password" placeholder="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forgot password</a>
                            <hr>
                            <h6>Password must contain the following:</h6>
                            <h6>
                                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number</b></p>
                                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                            </h6>
                        </form>
                        <form id="regform" method="POST" action="account.php">
                            <input type="text" placeholder="Username" name="username" required>
                            <b class="errorForm"><?= $username_err ?></b>
                            <input type="email" placeholder="Email" name="email" required>
                            <b class="errorForm"><?= $email_err ?></b>
                            <input type="password" placeholder="password" name="password" required="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <b class="errorForm"><?= $password_err ?></b>
                           <a href="C:\tools\xampp\htdocs\all.html\e-commerce.html"><button type="submit" class="btn">Register</button></a>
                            <hr>
                            <h6>Password must contain the following:</h6>
                            <h6>
                                <p id="letter" class="invalid">A lowercase</b> letter</p>
                                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                <p id="number" class="invalid">A <b>number<b>Minimum <b></b>8 characters</p>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                </div>
                <div class="app-logo">
                    <a href="https://play.google.com/store"> <img src="./play-store.png"></a>
                    <a href="https://www.apple.com/in/app-store/"> <img src="./app-store.png"></a>
                </div>

                <div class="footer-col-2">
                    <img src="./logo-white.png">
                    <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.</p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Link</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Retrun Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <a href="https://www.facebook.com/">
                            <li>Facebook</li>
                        </a>
                        <a href="https://twitter.com/?lang=en">
                            <li>Twitter</li>
                        </a>
                        <a href="https://www.instagram.com/">
                            <li>Instagram</li>
                        </a>
                        <a href="https://www.youtube.com/">
                            <li>YouTube</li>
                        </a>
                    </ul>
                </div>
            </div>
            <hr>
            <a href="https://www.facebook.com/ola.kikishs">
                <p class="copyright">dvlpr @@yUSh</p>
            </a>
        </div>

    </div>
    <!-- js for toggle menu -->
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";

        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            } else {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>
    <!-- js for tonggle form -->
    <script>
        var loginform = document.getElementById("loginform");
        var regform = document.getElementById("regform");
        var Indicator = document.getElementById("Indicator");

        function register() {
            regform.style.transform = "translateX(0px)";
            loginform.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }

        function login() {
            regform.style.transform = "translateX(300px)";
            loginform.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }
    </script>
</body>

</html>