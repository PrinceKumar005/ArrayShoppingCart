<?php
include('class.php');
session_start();
$ob = new gallery();
if(isset($_REQUEST['delf']))
{
    $id=$_REQUEST['delf'];
    $ob->deletef($id);
}
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

            if (isset($_REQUEST['f'])) {
                $id = $_SESSION['userid'];
                $ob->setfavourite($id);
            } 
            $id = $_SESSION['userid'];
            $show = $ob->getfavourite($id);
            if (isset($show)) {
                $i = 1;
                foreach ($show as $s) {
                ?>
                    <a href="picture.php?delf=<?php echo $s['id'] ;?>">
                                <button> 
                                    <div class="sub-container">
                                        <img id="img"src="image/<?php echo $s['image'] ?>" alt="" srcset=""><br><br>
                                        <label for="" id="label_name"><?php echo $s['name'] ;?></label><br>
                                        <label for="" id="label_username">@<?php echo $_SESSION['username'] ;?></label>
                                        <!-- <label for=""id="label_name">&nbsp;<i class="fa-sharp fa-solid fa-eye"></i>&nbsp;<?php echo $s['views'] ;?></label> -->
                                        <br>
                                        <br><br>
                                    </div>
                                </button>
                             </a>
            <?php
                    $i++;
                }
            }
            else {
                ?>
                    <h1 style="text-align:center">Your Are Not Add Any Picture There</h1>
                    <?php
                }
            ?>

        </div>
    </main>
</body>

</html>