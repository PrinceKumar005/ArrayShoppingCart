<?php
   include('class.php');
   session_start();
   $ob= new gallery();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/831e72727b.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
         include('common/header.php');
    ?>
    <main>
        <div class="container">
            <div class="signup">
                <h1>Login</h1>
                <span>Login in to your account</span>
                <br><br>
                <form action="" method="post">
                    <div class="table">
                        <table width="100%">
                            <tr>
                                <td><p>Enter Email ID*</p></td>
                            </tr>
                            <tr>
                            <td><input type="email" placeholder="Enter Your email....." name="email" id="text"></td>
                            </tr>
                            <tr>
                                <td><p>Enter Password*</p></td>
                            </tr>
                            <tr>
                            <td><input type="password" placeholder="Enter password" name="password" id="text"></td>
                            </tr>
                            <tr>
                                <td><button type="submit" value="SIGN UP"name="save"id="button">Sign Up</button></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td><a style="color:blue;font-size:22px;"href="signup.php"> Create new Acoount</a>
                            </td>
                            </tr>
                        </table>
                        <?php
                            if(isset($_REQUEST['save']))
                            {
                                $ob->exist_account();
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>