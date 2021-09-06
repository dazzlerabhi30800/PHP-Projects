<?php
session_start();
if(isset($_SESSION['unique_id'])){ // if user is logged in
        header("location: user.php");
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <title>Chatroom</title>
</head>
<body>
    <div class="wrapper">
        <section class="form login">
        <header>Realtime Chat App</header>
        <form action="#">
            <div class="error-txt">This is an error message!</div>
            
            
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" placeholder = "Enter your email" name = "email" >
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder = "Enter your Password" name = "password">
                    <i class="fas fa-eye"></i>
                </div>
               
                <div class="field button">
                   <input type="submit" value = "Continue to chat">
                </div>
           
        </form>
        <div class="link">Already signed up?<a href="index.php"> Signup Now</a></div>
    </section>
    </div>


    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>