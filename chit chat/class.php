<?php
    class msg{
        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="as1";
        private $connect;
        function __construct()
        {
            $this->connect=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if(mysqli_connect_error())
            {
                die("Connection Failed");
            }
            else{
                return $this->connect;
            }
        }
        function account(){
            $name=$this->connect->real_escape_string($_REQUEST['name']);
            $email=$this->connect->real_escape_string($_REQUEST['email']);
            $password=$this->connect->real_escape_string($_REQUEST['password']);
            $cpass=$this->connect->real_escape_string($_REQUEST['cpassword']);
            if($cpass == $password)
            {
               
                $file=$_FILES['f']['name'];
                $filepath=$_FILES['f']['tmp_name'];
                $extension=explode(".",$file);
                $ex=$extension[1];
                $query="show table status like 'login'";
                $result=$this->connect->query($query);
                $row=$result->fetch_assoc();
                $id=$row['Auto_increment'];
                $newname=$id.".".$ex;
                $query="select email from login";
                $result=$this->connect->query($query);
                $i=0;
                while($row=$result->fetch_assoc())
                {
                    if($row['email'] == $email)
                    {
                        $i++;
                    }
                }
                if($i==0)
                {
                    $query="insert into login(name,email,password,image) values('$name','$email','$password','$newname')";
                    $result=$this->connect->query($query);
                   if($result == true)
                    {
                        move_uploaded_file($filepath,"userimage/".$newname)
                       ?>
                       <script>
                          alert('Your account made successful');
                          window.location.href="login.php";
                       </script>
                       <?php
                    }
                }
                 else{
                    ?>
                    <script>
                        alert('Account Already Exist with this Username/Email');
                    </script>
                    <?php
                }
            }
            else{
                echo"Password and Confirmpassword Must be same";
            }
        }
        function login(){
            $email=$this->connect->real_escape_string($_REQUEST['email']);
            $password=$this->connect->real_escape_string($_REQUEST['password']);
            $query="select * from login where email='$email' and password='$password'";
            $result=$this->connect->query($query);
            $row=$result->fetch_assoc();
            if($result == true)
            {
                $_SESSION['userid']=$row['Id'];
                $_SESSION['useremail']=$row['email'];
                $_SESSION['username']=$row['name'];
                $_SESSION['userimage']=$row['image'];
                ?>
                <script>
                    alert('Login Successful');
                    window.location.href="index.php";
                </script>
                <?php
              
            }
            else{
                ?>
                <script>
                    alert('Login  Not Successful');
                </script>
                <?php
            }
        }
        function displayusers($id){
            $query="select * from login where id!='$id'";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $data=array();
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
        }
        function usermessage($chat,$userid){
            $user=$this->connect->real_escape_string($userid);
            $id=$this->connect->real_escape_string($chat);
            $message=$this->connect->real_escape_string($_REQUEST['message']);
            $query="insert into message(userid2,userid1,message) values($id,$user,'$message')";
            $result=$this->connect->query($query);
        }
        function displaymessage($id,$id1){
            $query="select * from message where (userid1=$id or userid2=$id) and (userid1=$id1 or userid2=$id1)";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $data=array();
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }
                return $data;
            }
        }
    }
?>