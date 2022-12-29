<?php
    class file{
        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="as1";
        private $connect;
        function __construct(){
            $this->connect= new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if(mysqli_connect_error())
            {
                die("connection error");
            }
            return $this->connect;
        }
        function getdata(){
            $name=$this->connect->real_escape_string($_POST['name']);
            $image=$_FILES['f']['name'];
            $filepath=$_FILES['f']['tmp_name'];
            $extract=explode(".",$image);
            $extension= $extract[1];
            $query="show table status like 'image'";
            $result=$this->connect->query($query);
            $row=$result->fetch_assoc();
            $id=$row['Auto_increment'];
            $newfilename=$id.".".$extension;
            $query="insert into image(name,image) values('$name','$newfilename') ";
            $result=$this->connect->query($query);
            if($result == true)
            {
                Echo "Record Inserted";
                move_uploaded_file($filepath,"image/".$newfilename);
            }    
            else{
                Echo "Record not Inserted";
            }     
        }
        function display(){
            $query="select * from image";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }return $data;
            }
        }
        function delete($id){
            $query="select image from image where id IN($id)";
            $result=$this->connect->query($query);
            $row=$result->num_rows;
            for($i=1;$i<=$row;$i++)
            {
                    $row1=$result->fetch_assoc();
                    unlink("image/".$row1['image']);
            }
            
            $query="delete from image where id IN($id)";
            $result=$this->connect->query($query);
            if($result == true)
            {
                Echo "Record deleted";
            }    
            else{
                Echo "Record not deleted";
            }     
        }
        function single($id){
            $query="select name from image where id=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $data=$result->fetch_assoc();
                return $data;
            }
        }
        function update($id){
            $query="select image from image where id=$id";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                $row=$result->fetch_assoc();
                unlink("image/".$row['image']);
            }
            $name=$this->connect->real_escape_string($_POST['name']);
            $image=$_FILES['f']['name'];
            $filepath=$_FILES['f']['tmp_name'];
            $extract=explode(".",$image);
            $extension= $extract[1];
            $newfilename=$id.".".$extension;
            $query="update image set name='$name',image='$newfilename' where id=$id" ;
            $result=$this->connect->query($query);
            if($result == true)
            {
                Echo "Record Inserted";
                move_uploaded_file($filepath,"image/".$newfilename);
            }    
            else{
                Echo "Record not Inserted";
            }     
        }
        function search($id){
            $query="select * from image where name like '%$id%'";
            $result=$this->connect->query($query);
            if($result->num_rows > 0)
            {
                while($row=$result->fetch_assoc())
                {
                    $data[]=$row;
                }return $data;
            }
        }
        

    }
?>