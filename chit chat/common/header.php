<header>
        <div class="head">
            <div class="img">
                <?php
                    if(isset($_SESSION['userid']))
                    {
                        ?>
                        <a href="index.php" ><img src="image/th.jpg"width="100px"id="logo" alt="" srcset=""></a>
                        <?php
                    }
                    else{
                        ?>
                        <a href="login.php?l=1" ><img src="image/th.jpg"width="100px"id="logo" alt="" srcset=""></a>
                        <?php
                    }
                ?>
            </div>
            <div class="login">
                <?php
                    if(empty($_SESSION['userid']))
                    {
                        ?>
                           <a href="login.php">
                                <input type="submit"id="login" value="Login">
                           </a>
                        <?php
                    }
                    else{
                        ?>
                        <a href="login.php?log=1">
                                <input type="submit"value="Logout" id="login">
                                <?php
                                      if(isset($_REQUEST['log']))
                                      {
                                          session_destroy();
                                          header('location:login.php');
                                      }
                                ?>
                           </a>
                        <?php
                    }
                ?>
               
            </div>
            <div class="profile">
                <?php
                    if(isset($_SESSION['userid']))
                    {
                        ?>
                         <img src="userimage/<?php echo $_SESSION['userimage'] ?>"width="50px"height="50px"style="margin-top:10px;border-radius:50%;border:1px solid black;" alt="" srcset="">
                        <?php
                    }
                    else{
                        ?>
                         <img src="image/download.png"width="50px"height="50px"style="margin-top:10px;border-radius:50%;border:1px solid black;" alt="" srcset="">
                        <?php
                    }
                ?>
                    <br>
                    <b style="color:white">
                    <?php
                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'];
                        }
                        else{
                            
                        }
                    ?>
                    </b>
            </div>
        </div>
    </header>