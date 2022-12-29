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
</head>
<body>
    <?php
        include('common/header.php');
    ?>
    <main>
        <div class="container">
            <div class="signup">
                <?php
                    if(isset($_REQUEST['eid']))
                    {
                        ?>
                        <h1>Update Your Profile</h1>
                        <br><br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="table">
                                <table width="100%">                           
                                    <input type="text"value="<?php if(isset($_REQUEST['eid'])){echo $_SESSION['username'];} ?>" placeholder="Enter Your Full Name....." name="name" id="text">
                                    <br>
                                    <input type="password" placeholder="Enter Your Old Password" name="op" id="text">
                                    <br>
                                    <input type="password" placeholder="Create your new password" name="npassword" id="text">
                                    <br>
                                    <input type="text" placeholder="Confirm Your Password" name="cpassword" id="text">
                                    <br>
                                        <button type="submit" value="Update Profile"name="save"id="button">Update Profile</button>
                                        <br><br>
                                        <a style="color:blue;font-size:22px;"href=""> Forgot Password ?</a>                             
                                </table>
                                <?php
                                    if(isset($_REQUEST['save']))
                                    {
                                        $id=$_SESSION['userid'];
                                        $op=$_REQUEST['op'];
                                        $opass=$_SESSION['userpassword'];
                                        if($opass == $op)
                                        {
                                            $ob->edituser($id);
                                            ?>
                                                <script>
                                                    alert('You need to Login Again After Changing Password');
                                                </script>
                                            <?php
                                            session_destroy();
                                        }
                                        else{
                                            echo "Wrong Password";
                                        }
                                        header('location:login.php');
                                    }
                                ?>
                            </div>
                        </form>
                        <?php
                        
                    }
                    else if(isset($_REQUEST['editpicture']))
                    {
                        ?>
                        <h1>Update Your Profile Picture</h1>
                        <br><br>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="table">
                                <table width="100%">    
                                    <p>Upload Picture here</p>                       
                                    <input type="file" name="f" id="text">
                                    <br>
                                        <button type="submit" value="Update Picture"name="save"id="button">Update Picture</button>
                                        <br><br>
                                        <a style="color:blue;font-size:22px;"href="profile.php">Back to Profile</a>                             
                                </table>
                                <?php
                                    if(isset($_REQUEST['save']))
                                    {
                                        $userid=$_SESSION['userid'];     
                                        $ob->updatepicture($userid);                                   
                                    }
                                ?>
                            </div>
                        </form>
                        <?php
                    }
                    else{
                        ?>
                          <h1>Sign UP</h1>
                            <span>Pls Provide Information to make Account</span>
                            <br><br>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="table">
                                    <table width="100%">                           
                                        <input type="text" placeholder="Enter Your Full Name....." name="name" id="text">
                                        <br>
                                        <input type="email" placeholder="Enter Your email....." name="email" id="text">
                                        <br>
                                        <input type="password" placeholder="Create your own password" name="password" id="text">
                                        <br>
                                        <input type="text" placeholder="Confirm Your Password" name="cpassword" id="text">
                                        <br>
                                        <input type="file" name="userimage" id="text">

                                            <button type="submit" value="SIGN UP"name="save"id="button">Sign Up</button>
                                        
                                        
                                            
                                        
                                        
                                            <a style="color:blue;font-size:22px;"href=""> Forgot Password ?</a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color:blue;font-size:22px;"href="login.php"> Already Have an account</a>
                                        
                                        
                                    </table>
                                    <?php
                                        if(isset($_REQUEST['save']))
                                        {
                                            $_SESSION['userpassword']=$_REQUEST['password'];
                                            $ob->account();
                                        }
                                    ?>
                                </div>
                            </form>
                        <?php
                    }
                ?>
              
            </div>
        </div>
    </main>
</body>
</html>