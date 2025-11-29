<?php
/**
 * Filename: login.php
 * Author: Kevinn Jose, Jiang Yu, Vincent, Ahmed
 * Description: Login page for users and admins.
 * Date: 2025
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Root Flower is a flower shop that based on Kuching, Sarawak Malaysia">
    <meta name="keywords" content="Flower, Root Flower, Kuching, Sarawak, Malaysia">
    <meta name="author" content="Kevinn Jose, Jiang Yu, Vincent, Ahmed">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Login Form - Root Flower</title>
</head>

<body>
    <?php 
    session_start();
    include("INCLUDE/navigation.php"); 
    ?>
    
    <section class="login-section">
    <div class="login-container">
            <div class="login-card">
            <h1>LOGIN</h1>
        <form id="detail" method="post" action="login_process.php">

            <div class="login-form">
            <div class="input-group">
            <img src="IMAGE/user.svg" alt="user">
            <input type="text"
                id="name"
                name="Login" 
                maxlength="20"
                pattern="[A-Za-z0-9]{1,20}"
                title="Login must be letters or numbers, up to 20 characters."
                placeholder="Type your username" required> 
            </div>
            
            <div class="input-group">
            <img src="IMAGE/password.svg" alt="password">
            <input type="password"
                id="password"
                name="password"
                maxlength="25"
                pattern="[A-Za-z0-9]{1,25}"
                title="Password must be letters or numbers, up to 25 characters."
                placeholder="Type your password" required></div>
                
        <?php
        if (isset($_SESSION['login_error'])) {
            echo '<p>Invalid username or password</p>';
            unset($_SESSION['login_error']);
        }
        ?>
        <div class="button-group">
                <button type="submit" class="login-btn">LOGIN</button>
                <button type= "reset" class="clear-btn">Reset Form </button>
        </div>
        <p class="separator">Or Sign up using</p>
        <div class="social-login">
            <a href="https://facebook.com"><img src="IMAGE/facebook2.svg" alt="Facebook"></a>
            <a href="https://twitter.com"><img src="IMAGE/twitter2.svg" alt="Twitter"></a>
            <a href="https://google.com"><img src="IMAGE/google.svg" alt="Google"></a>
        </div>
        <p class="signup-option">Or Sign up using <a href="#">SIGN UP</a></p>
        </div>
    </form>
    </div>
    </div>
    </section>
    </body>
</html>
