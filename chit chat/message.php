<?php
    session_start();
    include('class.php');
    $ob=new msg();
    if(isset($_REQUEST['userid']))
    {
      $_SESSION['chat']=$_REQUEST['userid'];
    }
    if(isset($_REQUEST['username']))
    {
      $_SESSION['chatname']=$_REQUEST['username'];
    }
    if(isset($_REQUEST['save']))
    {
        $chat=$_SESSION['chat'];
        $userid=$_SESSION['userid'];
        $ob->usermessage($chat,$userid);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chit Chat Message</title>
    <link rel="stylesheet" href="css/message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
   <?php
    include('common/header.php');
   ?>
   <main id=background style="background:url('https://images.unsplash.com/photo-1611330336123-9d2be2741fda?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover">
        <div class="container">
            <div class="message">
              <div class="msg">
                <?php
                  $id=$_SESSION['userid'];
                  $id1=$_SESSION['chat'];
                  $show=$ob->displaymessage($id,$id1);
                  if(isset($show))
                  {
                    foreach($show as $s)
                    {
                      if($s['userid2']==$_SESSION['chat'])
                      {
  
                      
                     ?>
                      <div class="chatbox">
                        <label><?php
                          echo $s['message'];
                        ?></label>
                      </div>
                     <?php
                    }
                    else{
                      ?>
                     
                      <div class="chatbox1">
                        <label><?php
                          echo $s['message'];
                        ?></label>
                        <br><br>
                        <sup style="font-size:15px;float:right;"> <label>from : <?php
                          echo $_SESSION['chatname'];
                        ?></label></sup>
                      </div>
                     <?php
                    }
                    }
                  }
                  else{
                    ?>
                     <div class="chatbox2">
                        <label>Say Hello To Your Friend <b><?php echo $_SESSION['chatname'] ?></b></label>
                      </div>
                    <?php
                  }
                ?>
              </div>
              <br>
              <form action="" method="get">
                <div class="type">
                  <input autofocus="autofocus" type="text" name="message"style="height:50px;" id="message" required > &nbsp;&nbsp;
                  <button height="60px"name="save" type="<?php if(isset($_REQUEST['message'])){echo "submit";}else{ } ?>"id="send"><i class="fa-solid fa-paper-plane-top">Send</i></button>
                </div>
              </form>
            </div>
        </div>
   </main>
</body>
</html>