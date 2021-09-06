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
        <section class="form signup">
        <header>Realtime Chat App</header>
        <form action="#" enctype="multipart/form-data" autocomplete = "off">
            <div class="error-txt"></div>
            <div class="name-details">
                <div class="field input">
                    <label>First name</label>
                    <input type="text" placeholder = "First name" name = "fname" required>
                </div>
                <div class="field input">
                    <label>Last name</label>
                    <input type="text" placeholder = "Last name" name="lname" required>
                </div>
            </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" placeholder = "Enter your email address" name="email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder = "Password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select image</label>
                    <input type="file" name="image" >
                </div>
                <div class="field button">
                   <input type="submit" value = "Continue to chat">
                </div>
           
        </form>
        <div class="link">Already signed up?<a href="login.php"> Login Now</a></div>
    </section>
    </div>

    <script src="javascript/signup.js"></script>
    <script src="javascript/pass-show-hide.js"></script>
</body>
</html>