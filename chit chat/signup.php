<?php
    session_start();
    include('class.php');
    $ob=new msg();
    if(isset($_REQUEST['save']))
    {
        $ob->account();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" enctype="multipart/form-data">
        <h3>Create Your Account</h3>

        <label for="username">Name</label>
        <input type="text" placeholder="Enter fullname"name="name" id="username" required>
        
        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone"name="email" id="username"required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password"name="password" id="password"required>

        <label for="password">Confirm Password</label>
        <input type="password" placeholder="Confirm Your Password"name="cpassword" id="password"required>

        <label for="password">Upload Image</label>
        <input type="file" name="f" id="password">

        <button type="Submit" name="save"id="button"value="Sign UP">Sign Up</button>
        <div class="social">
          <div class="go"><a href="login.php">Already Have An Account ?</a> </div>
        </div>
    </form>
</body>
</html>
