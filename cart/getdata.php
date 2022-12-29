<?php
    include('class.php');
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_REQUEST['save']))
        {
                if(isset($_SESSION['cart']))
                {
                    $product=array_column($_SESSION['cart'],'name');
                    if(in_array($_REQUEST['n'],$product))
                    {
                        echo"<script>
                        alert('Item already added');
                        window.location.href='getdata.php';
                        </script>";
                        print_r($_SESSION['cart']);
                    }
                    else{
                        $count=count($_SESSION['cart']);
                        $_SESSION['cart'][$count]=array("name"=>$_REQUEST['n'],"price"=>$_REQUEST['p'],"color"=>$_REQUEST['c'],"size"=>$_REQUEST['s']);
                        echo"<script>
                        alert('Item added');
                        window.location.href='getdata.php';
                        </script>";
                    }
                
                }
                else{
                    $_SESSION['cart'][0]=array("name"=>$_REQUEST['n'],"price"=>$_REQUEST['p'],"color"=>$_REQUEST['c'],"size"=>$_REQUEST['s']);
                    print_r($_SESSION['cart']);
                    echo"<script>
                        alert('Item added');
                        window.location.href='getdata.php';
                        </script>";
                }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
       <h1>Today we learn how to make shopping cart</h1>
    </header>
    <a href="showcart.php"><input type="button" value="Cart" id="cart"name="cart"></a>
    <main>
        <form action="getdata.php" method="post">
           
            <table class="input">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="n" id="input"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="text" name="p" id="input"></td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td><input type="text" name="c" id="input"></td>
                </tr>
                <tr>
                    <td>Size</td>
                    <td><input type="text" name="s" id="input"></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Save"name="save"id="save"></td>
                    <td><a href="getdata.php"><input type="button" value="Reset"name="reset"id="reset"></a></td>
                </tr>
            </table>
        </form>
        <form action="showcart.php" method="get">
            <table width="100%" border="1"style="text-align:center">
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>
                <?php
                    if(isset($_SESSION['cart']))
                    {
                        $i=1;
                        foreach($_SESSION['cart'] as $key => $value)
                        {
                           ?>
                           <tr>
                           <td><?php echo $i?><input type="hidden"value="<?php echo $i ?>" name="id"></td>
                           <td><?php echo $value['name'];?><input type="hidden"value="<?php echo $value['name'] ?>" name="n"></td>
                           <td><?php echo $value['price'];?><input type="hidden"value="<?php echo $value['price'] ?>" name="p"></td>
                           <td><?php echo $value['color'];?><input type="hidden"value="<?php echo $value['color'] ?>" name="c"></td>
                           <td><?php echo $value['size'];?><input type="hidden"value="<?php echo $value['size'] ?>" name="s"></td>
                           <td><input type="submit" value="Add To Cart" id="add" name="cart"></td>
                           </tr>
                            <?php
                           $i++;
                        }
                    }
                ?>
            </table>
        </form>
    </main>
</body>
</html>