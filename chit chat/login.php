<?php
    include('class.php');
    session_start();
    $ob=new msg();
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
    <form method="post"action="">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text"name="email" placeholder="Email or Phone" id="username" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required>

        <button type="submit" name="save"id="button">Log In</button>
        <div class="social">
          <div class="go"><a href="">Forget Password?</a></div>
          <div class="go"><a href="signup.php">Create New Account ?</a> </div>
        </div>
        <?php
              if(isset($_REQUEST['save']))
              {
                  $ob->login();
              }
        ?>
    </form>
</body>
</html>
