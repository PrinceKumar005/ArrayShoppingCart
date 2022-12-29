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
    <title>User Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('common/header.php');
    ?>
    <main>
        <div class="main-container">
            <div class="con" style="margin:auto;width: 800px;padding:20px;">
                <div class="img"style="width: 225px;margin:auto;">
                    <img id="img"style="border-radius:30%;margin:auto;padding:10px"src="image/userimage/<?php
                        echo $_SESSION['userimage']
                    ?>" alt="" sizes="" srcset="">
                    <a href="signup.php?editpicture=1"><button style="cursor:pointer"title="Edit Your Profile Image"><i class="fa-solid fa-pen-to-square"></i></button></a>
                </div>
                <div class="name" style="width: 500px;margin:auto">
                    <h1 style="font-size:50px;width: 400px;margin:auto">Hi <?php echo $_SESSION['username']; ?></h1>
                </div>
                <div class="edit">
                   <a href="signup.php?eid=1" ><button name="edit"id="button">Edit Profile</button></a>
                </div>
                <div class="Personal">
                    <a href="Personal.php"><button id="button">Personal Pictures</button></a>
                </div>
            </div>

        </div>
    </main>
    <main>
        <div class="main-container">
            <?php
                $id=$_SESSION['userid'];
                $show=$ob->getuserdata($id);
                if(isset($show))
                {
                    foreach($show as $s)
                    {
                        ?>
                           <a href="picture.php?picture=<?php echo $s['Id'] ;?>&userid=<?php echo $s['userid'] ?>">
                                <button> 
                                    <div class="sub-container">
                                        <img id="img"src="image/<?php echo $s['image'] ?>" alt="" srcset=""><br><br>
                                        <label for="" id="label_name"><?php echo $s['name'] ;?></label><br>
                                        <label for="" id="label_username">@<?php echo $s['fullname'] ;?></label>
                                        <label for=""id="label_name">&nbsp;<i class="fa-sharp fa-solid fa-eye"></i>&nbsp;<?php echo $s['views'] ;?></label>
                                        <br>
                                        <br><br>
                                    </div>
                                </button>
                             </a>
                        <?php        
                    }
                }
                else{
                    ?>
                    <h1 style="text-align:center ;">No Post Yets</h1>
                    <?php
                }
            ?>
           
        </div>
    </main>
</body>
</html>