<?php
    include('class.php');
    session_start();
    $ob=new gallery();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picture</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('common/header.php');
    ?>
    <main>
        <div class="maincontainer">
            <?php
            if(isset($_REQUEST['picture']))
            {
                $id=$_REQUEST['picture'];
                $show=$ob->getpicture($id);
                if(isset($show))
                {
                    foreach($show as $s)
                    {
                        ?>
                            <div class="subcontainer">
                                <img id="picture" height="600px"src="image/<?php echo $s['image'] ?>"alt="" srcset=""><br>
                                <label for=""id="label_name"><?php echo $s['name'] ;?></label>
                                <label for=""id="label_username">@<?php echo $_SESSION['imageuser'] ;?></label>
                                <label for=""id="label_name">&nbsp;<i class="fa-sharp fa-solid fa-eye"></i>&nbsp;<?php echo $s['views'] ;?></label>
                                <a href="favourite.php?f=<?php echo $s['Id'] ?>&name=<?php echo $s['name'] ?>&userid=<?php echo $s['userid'] ?>&image=<?php echo $s['image'] ?>&views=<?php echo $s['views'] ?>"><input type="submit" value="Add To Favourite" id="star"></a>
                                <br><br>
                                <?php
                                    if(isset($_REQUEST['userid']))
                                    {
                                        ?>
                                        <a href="picture.php?del=<?php echo $s['Id']?>">
                                        <button style="cursor:pointer">
                                            <i class="fa-solid fa-trash" id="delete"></i>
                                        </button>
                                         </a>
                                         <?php
                                    }
                                ?>
                               
                                <br>
                                ......
                             </div>
                        <?php    
                         $ob->views($id); 
                    }
                }
                
            }
            else if(isset($_REQUEST['delf']))
            {
                $id=$_REQUEST['delf'];
                $show=$ob->getfavourite1($id);
                if(isset($show))
                {
                    foreach($show as $s)
                    {
                        ?>
                            <div class="subcontainer">
                                <img id="picture" height="600px"src="image/<?php echo $s['image'] ?>"alt="" srcset=""><br>
                                <label for=""id="label_name"><?php echo $s['name'] ;?></label>
                                <label for=""id="label_username">@<?php echo $_SESSION['imageuser'] ;?></label>
                                <label for=""id="label_name">&nbsp;<i class="fa-sharp fa-solid fa-eye"></i>&nbsp;<?php echo $s['views'] ;?></label>
                                <a href="favourite.php?delf=<?php echo $s['id']?>"><input type="submit"name="deletefavourite" value="Remove from Favourite" id="star"></a>
                                <br><br>                             
                                <br>
                                ......
                             </div>
                        <?php    
                         $ob->views($id); 
                    }
                }
            }
            else if(isset($_REQUEST['del']))
                {
                    $id=$_REQUEST['del'];
                    $ob->deleteimage($id);
                }
               
               
            ?>
           
        </div>
    </main>
</body>
</html>