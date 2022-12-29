<?php
    session_start();
    include('class.php');
    $ob=new msg();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chit Chat Message</title>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body  style="background:url('https://images.unsplash.com/photo-1611330336123-9d2be2741fda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover">
   <?php
    include('common/header.php');
   ?>
   <main id=background>
        <div class="container">
            <?php
                if(isset($_SESSION['userid'])){

                    $id=$_SESSION['userid'];
                    $data=$ob->displayusers($id);
                    foreach($data as $d)
                    {
                

                
            ?>
            <div class="number">
                <?php
                    if(isset($_SESSION['userid']))
                    {
                        ?>
                         <img src="userimage/<?php echo $d['image']?>"width="100px"height="120px"id="profile" alt="" srcset="">

                        <?php
                    }
                    else{
                        ?>
                         <img src="image/download.png"width="50px"height="50px"style="margin-top:10px;border-radius:50%;border:1px solid black;" alt="" srcset="">
                        <?php
                    }
                ?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <h2>
                    <a class="username"href="message.php?userid=<?php echo $d['Id'] ?>&username=<?php echo $d['name']?>&userimage=<?php echo $d['image'] ?>">
                    <?php
                        if(isset($_SESSION['username']))
                        {
                            echo $d['name'];
                        }
                        else{
                            echo"Pls Login In To See Contacts";
                        }
                    ?>

                    </a>
                </h2>
                
            </div><br>
            <?php
                }
            }
            ?>
        </div>
   </main>
</body>
</html>