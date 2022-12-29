<?php
    include('connect.php');
    // print_r($_FILES);
    // print_r($_POST);
    $ob= new file();
    if(isset($_REQUEST['save']))
    {
        $ob->getdata();
    }
    if(isset($_REQUEST['delete']))
    {
        $check=$_REQUEST['check'];
        $id=implode(",",$check);
        $ob->delete($id);
    }
    if(isset($_REQUEST['update'])&&isset($_REQUEST['edit']))
    {
        $id=$_REQUEST['edit'];
        $ob->update($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if(isset($_REQUEST['edit']))
        {
            $id=$_REQUEST['edit'];
            $edit=$ob->single($id);
        }
        ?>
        Enter name <input type="text" name="name"
        value="<?php if(isset($_REQUEST['edit'])){ echo $edit['name'];} ?>"
        id=""><br><br>
        Upload File <input type="file" name="f" id=""><br><br>
        <?php
            if(isset($_REQUEST['edit']))
            {
                ?>
                <input type="submit" value="Update" name="update">
                <?php
            }
            else{
                ?>
                <input type="submit" value="Save" name="save">
                <?php
            }
        ?>
        <a href="fileupload.php"><input type="button" value="Reset" name="reset"></a>
        <br><br>
    </form>
    <form action="" method="post">
        <input type="text" placeholder="search by name...."name="search" id="">
        <input type="submit" value="Search"name="submit"><br><br>
        <table width="80%" border="1" style="text-align:center">
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Image</th>
                <th>Edit</th>
                <th><input style="padding:8px"type="submit" value="Delete" name="delete"></th>
            </tr>
            <?php
                if(isset($_REQUEST['submit']))
                {
                    $id=$_REQUEST['search'];
                    $showdata=$ob->search($id);
                    $i=1;
                foreach($showdata as $s)
                {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $s['name'] ;?></td>
                        <td><img height="150px"src="image/<?php echo $s['image'] ?>"</td>
                        <td><button value="Edit"><a href="fileupload.php?edit=<?php echo $s['id'];?>">Edit</a></button></td>
                        <td><input type="checkbox" name="check[]"value="<?php echo $s['id'] ?>" id=""></td>
                    </tr>
                    <?php
                    $i++;
                }
                }
                else{
                    $showdata=$ob->display();
                    $i=1;
                foreach($showdata as $s)
                {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $s['name'] ;?></td>
                        <td><img height="150px"src="image/<?php echo $s['image'] ?>"</td>
                        <td><button value="Edit"><a href="fileupload.php?edit=<?php echo $s['id'];?>">Edit</a></button></td>
                        <td><input type="checkbox" name="check[]"value="<?php echo $s['id'] ?>" id=""></td>
                    </tr>
                    <?php
                    $i++;
                }
                }
                
            ?>
            <tr>
                
            </tr>
        </table>
    </form>
</body>
</html>