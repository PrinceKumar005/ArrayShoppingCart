<?php
    class gallery{
        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="image_gallery";
        private $connect;
        function __construct(){
             $this->connect=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
             if(mysqli_connect_error())
            {
                die("Connection Failed");
            }
            return $this->connect;
        }
        function account(){
            $name=$this->connect->real_escape_string($_REQUEST['name']);
            $email=$this->connect->real_escape_string($_REQUEST['email']);
            $password=$this->connect->real_escape_string($_REQUEST['password']);
             $cpassword=$this->connect->real_escape_string($_REQUEST['cpassword']);
            if($cpassword == $password)
             {
                $file=$_FILES['userimage']['name'];
                $filepath=$_FILES['userimage']['tmp_name'];
                $extension=explode(".",$file);
                $ex=$extension[1];
                $query="show table status like 'account'";
                $result=$this->connect->query($query);
                $row=$result->fetch_assoc();
                $id=$row['Auto_increment'];
                $newname=$id.".".$ex;
                $query="insert into account(fullname,email,password,image) values('$name','$email','$password','$newname') ";
                $result=$this->connect->query($query);
                if( $result == true )
                {
                    move_uploaded_file($filepath,"image/userimage/".$newname)
                       ?>
                       <script>
                        alert("Your Account Made Successful");
                       </script>
                       <?php
                       
                }
                else{
                        ?>
                            <div class="alert alert-danger" role="alert">
                                Something Wrong
                            </div>
                        <?php
                    }
                    header('location:login.php');
             }
             else{
                 Echo "Password and Confirm Password Must be Same";  
             }
         }
         function exist_account(){
            $email=$this->connect->real_escape_string($_REQUEST['email']);
            $password=$this->connect->real_escape_string($_REQUEST['password']);
            $query="select * from account where email='$email'and password='$password'";
            $result=$this->connect->query($query);
            $row=$result->fetch_assoc();
            $count=$result->num_rows;
            if($count > 0)
            {
                $_SESSION['userid']=$row['Id'];
                $_SESSION['username']=$row['fullname'];
                $_SESSION['userimage']=$row['image'];
                $_SESSION['userpassword']=$row['password'];
                ?>
                <script>
                    alert("You SuccessFully Logged In");
                </script>
                <?php
                if(isset($_SESSION['userid']))
                {
                    header('location:index.php');
                }
            }
            else{
                ?>
                <script>
                    alert("Email not registered");
                </script>
                <?php
            }
         }
         function upload($userid){
            $name=$this->connect->real_escape_string($_REQUEST['image_name']);
            $visibility=$this->connect->real_escape_string($_REQUEST['visibility']);
            $file=$_FILES['f']['name'];
            $filepath=$_FILES['f']['tmp_name'];
            $extension=explode(".",$file);
            $ex=$extension[1];
            $query="show table status like 'image'";
            $result=$this->connect->query($query);
            $row=$result->fetch_assoc();
            $id=$row['Auto_increment'];
            $date=date('Y-m-d-H-s');
            $newname=$id+$date.".".$ex;
            echo $newname;
            $query="insert into image(userid,name,image,visibility) values($userid,'$name','$newname','$visibility') ";
            $result=$this->connect->query($query);
            if($result == true)
            {
                move_uploaded_file($filepath,"image/".$newname);
                ?>
                <script>
                    alert("Your image is Uploaded Succeessfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Your image is not Uploaded");
                </script>
                <?php
            }
            if(isset($_SESSION['userid']))
                {
                    header('location:index.php');
                }
         }
         function getdata(){
            $query="select * from account c,image m where c.id=m.userid and visibility='Public'";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
            else{
                
            }
            
         }
         function getpicture($id){
            $query="select * from image where id=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;                
            }
            else{
                
            }
        }
        function views($id){
            $query="update image set views=views+1 where id=$id";
            $result=$this->connect->query($query);
        }
         function getuserdata($id){
            $query="select * from account c,image m where c.id=m.userid and (visibility='Public' or visibility='Private') and userid=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
            else{

            }
         }
         function selectsingledata(){
            $query="select name,password from 'account'";
            $result=$this->connect->query($query);
            $row=$result->fetch_assoc();
            $data[]=$row;
            return $data;
         }
         function edituser($id){
            $name=$this->connect->real_escape_string($_REQUEST['name']) ;
            $newpass=$this->connect->real_escape_string($_REQUEST['npassword']);
            $cpass=$this->connect->real_escape_string($_REQUEST['cpassword']);
            if($cpass == $newpass)
            {
                $query="update account set fullname='$name',password='$newpass' where id=$id";
                $result=$this->connect->query($query);
                if($result == true )
                {
                    ?>
                        <script>
                            alert('Your Profile Is Updated');
                        </script>
                    <?php
                }  
                else{
                    ?>
                    <script>
                        alert('Your Profile Is Not Updated');
                    </script>
                    <?php
                }
            }
            else{
               echo "New Password And Confirm Password Must Be Same";
            }
         }
         function getuserpersonaldata($id){
            $query="select * from image where userid=$id and visibility='Protected'";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
            else{

            }
         }
         function setfavourite($id){
            $userid=$this->connect->real_escape_string($_REQUEST['userid']);
            $name=$this->connect->real_escape_string($_REQUEST['name']);
            $views=$this->connect->real_escape_string($_REQUEST['views']);
            $image=$this->connect->real_escape_string($_REQUEST['image']);
            $que="select * from favourite where name='$name'";
            $r=$this->connect->query($que);
            if($r != true)
            {
                ?>
                <script>
                    alert("Your Already add this image to Favourite");
                </script>
                <?php
            }
            else{
                $imageid=$id;
                $query="insert into favourite(userid,imageid,name,image,views) values($userid,$imageid,'$name','$image','$views') ";
                $result=$this->connect->query($query);
                if($result == true)
                {
                    header('location:favourite.php');
                }
                else{
                    ?>
                    <script>
                        alert("Your image is not Uploaded");
                    </script>
                    <?php
                }
            }
           
         }
         function getfavourite($id){
            $query="select * from favourite where imageid=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
            else{

            }
         }
         function getfavourite1($id){
            $query="select * from favourite where id=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
            else{

            }
         }
         function updatepicture($userid){
            $query="select image from account where id=$userid";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $row=$result->fetch_assoc();
                unlink("image/userimage/".$row['image']);
            }
            $file=$_FILES['f']['name'];
            $filepath=$_FILES['f']['tmp_name'];
            $extension=explode(".",$file);
            $ex=$extension[1];
            $date=date('Y-m-d-H-s');
            $newname=$userid+$date.".".$ex;
            $query="update account set image='$newname' where id=$userid";
            $result=$this->connect->query($query);
            if($result == true)
            {
                move_uploaded_file($filepath,"image/userimage/".$newname);
                ?>
                <script>
                    alert("Your image is Uploaded Succeessfully");
                </script>
                <?php
            }
            else{
                ?>
                <script>
                    alert("Your image is not Uploaded");
                </script>
                <?php
            }
            header('location:index.php');
         }
        function deleteimage($id){
            $query="select image from account where id=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $row=$result->fetch_assoc();
                unlink("image/".$row['image']);
            }
            $query="delete from image where id=$id";
            $result=$this->connect->query($query);
            if($result == true )
            {
                ?>
                    <script>
                        alert('Your Image Is Deleted');
                    </script>
                    
                <?php
                header('location:profile.php');
            }  
            else{
                ?>
                <script>
                    alert('Your Image Is not Deleted');
                </script>
                <?php
            }
        }
        function deletef($id){
            // $query="select image from account where id=$id";
            // $result=$this->connect->query($query);
            // if($result->num_rows > 0)
            // {
            //     $row=$result->fetch_assoc();
            //     unlink("image/".$row['image']);
            // }
            $query="delete from favourite where id=$id";
            $result=$this->connect->query($query);
            unlink("image/".$result['image']);
            if($result == true )
            {
                ?>
                    <script>
                        alert('Your Image Is Deleted');
                        
                    </script>
                    
                <?php
                header('location:profile.php');
            }  
            else{
                ?>
                <script>
                    alert('Your Image Is not Deleted');
                </script>
                <?php
            }
        }
    }
?>



