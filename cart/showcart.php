<?php
    include('class.php');
    session_start();
    if(isset($_REQUEST['cart']))
    {
        if(isset($_SESSION['cart1']))
        {
            $product=array_column($_SESSION['cart1'],'name');
                if(in_array($_REQUEST['n'],$product))
                {
                    echo"<script>
                    alert('Item already added');
                    window.location.href='getdata.php';
                    </script>";
                }
                else{
                    $count=count($_SESSION['cart1']);
                    $_SESSION['cart1'][$count]=array("name"=>$_REQUEST['n'],"price"=>$_REQUEST['p'],"color"=>$_REQUEST['c'],"size"=>$_REQUEST['s']);
                    print_r($_SESSION['cart1']);
                    echo"<script>
                    alert('Item added');
                    window.location.href='getdata.php';
                    </script>";
                }
            
        }
        else{
            $_SESSION['cart1'][0]=array("name"=>$_REQUEST['n'],"price"=>$_REQUEST['p'],"color"=>$_REQUEST['c'],"size"=>$_REQUEST['s']);
            print_r($_SESSION['cart1']);
            echo"<script>
            alert('Item added');
            window.location.href='getdata.php';
            </script>";
             print_r($_SESSION['cart']);
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
    <a href="getdata.php"><input type="button" value="Back" id="cart"name="Back"></a>

    <main>
        <form action="" method="post">
            <br><br>
            <input type="submit"style="width: 150px;" value="Clear Cart" id="reset" name="clear">
           <?php if(isset($_REQUEST['clear']))
            {
                unset($_SESSION['cart1']);
                header('location:showcart.php');
            }?>
            <br>
            <br>
            <table width="100%" border="1"style="text-align:center">
                <tr>
                    <th colspan="5">Your Selected items are there</th>
                </tr>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Size</th>
                </tr>
                <?php
                    if(isset($_SESSION['cart1']))
                    {
                        $total=0;
                        $i=1;
                        foreach($_SESSION['cart1'] as $key => $value)
                        {
                            $total=$total+$value['price'];
                           ?>
                           <tr>
                           <td><?php echo $i?></td>
                           <td><?php echo $value['name'];?></td>
                           <td><?php echo $value['price'];?></td>
                           <td><?php echo $value['color'];?></td>
                           <td><?php echo $value['size'];?></td>
                           </tr>
                           
                            <?php
                           $i++;
                        }
                        ?>
                        <tr>
                            <td colspan="4"> Total Price</td>
                            <td>₹ <?php echo $total?></td>
                            </tr>
                        <?php
                    }
                ?>
                
            </table>
        </form>
    </main>
</body>
</html>