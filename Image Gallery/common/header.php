<?php
    
?>
<header>
<script src="https://kit.fontawesome.com/831e72727b.js" crossorigin="anonymous"></script>

    <div class="container">
        <ul>
          <li><a href ="index.php">Home</a></li>
            <?php
                if(isset($_SESSION['userid']))
                {
                    ?>
                     <li><a href="favourite.php">Favourite</a></li>
                    <?php
                }
                else{
                    ?>
                    <li><a href="login.php">Favourite</a></li>
                    <?php
                }
            ?>
        </ul>
       <div class="login">
        <div class="btn">
            <?php
                if(isset($_SESSION['username']))
                {
                    ?>
                        <a href="upload.php"><input type="button" value="Upload" name="upload" id="login"></a>
                    <?php
                }
                else{
                    ?>
                        <a href="login.php"><input type="button" value="Upload" name="upload" id="login"></a>
                    <?php
                }
            ?>
        </div>
        <div class="btn">
            <?php
                 if(isset($_SESSION['username']))
                 {
                     ?>
                        
                         <a href="profile.php">
                         <?php
                            if(empty($_SESSION['image']))
                            {
                                ?>
                                <img src="image/userimage/<?php echo $_SESSION['userimage'] ?>"id="profile" alt="" sizes="" srcset="">
                                <?php
                            }
                            else{
                                ?>
                                <i class="fa fa-address-book"id="profile" ></i>
                                <?php
                            }
                         ?>   
                         
                         <br>
                         <select style="background:none;border:none;color:white"name="" id=""></select>
                         <div class="profile">
                             <table width="90%">
                                <tr>
                                    <td>
                                    </td>
                                </tr>
                             </table>
                         </div>
                         <br>
                        </a>
                     <?php
                 }
                 else{
                     ?>
                     <?php
                 }
            ?>
        </div>
        <div class="btn">
            <?php
                 if(isset($_SESSION['username']))
                 {
                     ?>
                         <a href="index.php?log=1"><input type="button" value="Logout" name="logout" id="login"></a>
                         <?php
                         
                             if(isset($_REQUEST['log']))
                             {
                                 session_destroy();
                                 header('location:index.php');
                             }
                         ?>
                     <?php
                 }
                 else{
                     ?>
                         <a href="login.php"><input type="button" value="Login" name="login" id="login"></a>
                     <?php
                 }
            ?>
        </div>
       </div>
    </div>
</header>