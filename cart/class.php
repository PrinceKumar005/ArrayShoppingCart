<?php
    // class cart{
    //     private $servername="localhost";
    //     private $username="root";
    //     private $password="";
    //     private $dbname="as1";
    //     private $connect;
    //     function __construct(){
    //         $this->connect=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    //         if(mysqli_connect_error())
    //         {
    //             die("Connection failed");
    //         }
    //         return $this->connect;
    //     }
    //     function getdata(){
    //         $name=$this->connect->real_escape_string($_REQUEST['name']);
    //         $price=$this->connect->real_escape_string($_REQUEST['price']);
    //         $color=$this->connect->real_escape_string($_REQUEST['color']);
    //         $size=$this->connect->real_escape_string($_REQUEST['size']);
    //         $query="insert into cart(name,price,color,size) values('$name','$price','$color','$size') ";
    //         $result=$this->connect->query($query);
    //         if( $result == true )
    //         {
    //             echo "Data Inserted";
    //         }
    //         else{
    //             echo "Data not Inserted";
    //         }
    //     }
    //     function displaydata(){
    //         $query="select * from cart";
    //         $result=$this->connect->query($query);
    //         if($result->num_rows > 0)
    //         {
    //             while($row=$result->fetch_assoc())
    //             {
    //                 $data[]=$row;
    //             }
    //             return $data;
    //         }
    //      }

    // }
?>