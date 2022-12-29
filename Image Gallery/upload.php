<?php
    include('class.php');
    session_start();
    $ob=new gallery();
    if(isset($_REQUEST['upload']))
    {
        $userid=$_SESSION['userid'];
        $ob->upload($userid);
    }
    else{
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include('common/header.php');
    ?>
    <main>
        <div class="container">
            <div class="signup">
                <h1>Upload Your Beautiful Memmories</h1>
                <span>Tell your story to the world through pictures</span>
                <br><br>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="table">
                        <table width="100%">
                            <tr>
                                <td><p>Enter full Name</p></td>
                            </tr>
                            <tr>
                            <td><input type="text" placeholder="Enter Your Full Name....." name="image_name" id="text"></td>
                            </tr>
                            <tr>
                                <td><p>Upload Your Image Here</p></td>
                            </tr>
                            <tr>
                            <td><input type="file" name="f"content="select some file" id="file"></td>
                            </tr>
                            <tr>
                                <td><p>Visibility</p></td>
                            </tr>
                            <tr>
                            <td><select name="visibility" id="text">
                                <option value="Public">Public</option>
                                <option value="Private">Private</option>
                                <option value="Protected">Personal</option>
                            </select></td>
                            </tr>
                            <tr>
                                <td><button type="submit" value="Upload Image"name="upload" id="button">Upload Image</button></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <a style="color:blue;font-size:22px;"href="index.php"> Back to the Home Page</a>
                            </td>
                            </tr>
                        </table>
                        <?php
                            if(isset($_REQUEST['save']))
                            {
                                $ob->account();
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>