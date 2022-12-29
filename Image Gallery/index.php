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
    <title>Index File</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('common/header.php');
    ?>
    <main>
        <div class="main-container">
            <?php
                $show=$ob->getdata();
                if(isset($show))
                {
                    $i=1;
                    foreach($show as $s)
                    {
                        ?>
                            <a href="picture.php?picture=<?php echo $s['Id'] ;?>">
                                <button> 
                                    <div class="sub-container">
                                        <img id="img"src="image/<?php echo $s['image'] ?>" alt="" srcset=""><br><br>
                                        <label for="" id="label_name"><?php echo $s['name'] ;?></label><br>
                                        <?php
                                            $_SESSION['imageuser']=$s['fullname'];
                                        ?>
                                        <label for="" id="label_username">@<?php echo $_SESSION['imageuser'] ;?></label>
                                         <label for=""id="label_name">&nbsp;<i class="fa-sharp fa-solid fa-eye"></i>&nbsp;<?php echo $s['views'] ;?></label>
                                         <i class="fa-regular fa-star"></i>

                                    </div>
                                </button>
                             </a>
                        <?php 
                        $i++;       
                    }
                }
            ?>
           
        </div>
    </main>
</body>
</html>