<?php
    if(isset($_REQUEST['location']))
    {
        $loc=$_REQUEST['location'];
        $url="http://api.openweathermap.org/data/2.5/weather?q=$loc&appid=49c0bad2c7458f1c76bec9654081a661";
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        $result=json_decode($result,true);
        // echo"<pre>";
        // print_r($result);
    }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
</head>
<body>
    <main style="margin:0;padding:0;">
        <div class="container"style="width: 1300px;;margin:auto;margin-top:120px;">
            <div class="table"style="width: 800px;margin:auto;">
            <form action="" method="post">
                 <input style="width:420px;height:40px"type="text"placeholder="Enter City Name" name="location" id="">
                 <input style="background-color:black;color:white;padding:10px;font-size:20px"type="submit" value="Search"name="save">
                 <?php
                       if(isset($_REQUEST['save']))
                       {
                        if(isset($_REQUEST['location']))
                        {
                        ?>
                         <div class="weather"style="width: 800px;margin:auto;margin-top:0">
                            <div class="location">
                              <span style="font-size:40px"><?php echo $result['name']?></span>
                            </div>
                             <div class="img"style="">
                                  <img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon']?>@4x.png" alt="" srcset="">
                             </div>
                            <div class="temp"style="float:left">
                                <div class="tmp"style="float:left;padding:25px">
                                    <span style="font-size:40px"><?php echo round($result['main']['temp']-273.15)?>'</span>
                                </div>
                                <div class="wind"style="font-size:40px;float:left;padding:25px">
                                    <span><?php
                                        echo $result['wind']['speed'] 
                                    ?>M/H</span>
                                </div>
                                <div class="date"style="font-size:40px;float:left;padding:25px">
                                    <span><?php echo date('d M',($result['dt'])) ?></span>
                                </div>
                            </div>
                         </div>
            
                        <?php
                        }
                        else{
                            echo "no record found";
                        }
                       }      
                       else{
                        ?>
                        <h2>No Record Found</h2>
                        <?php
                       }               
                ?>
            </form>
            </div>
                
               
        </div>
    </main>
</body>
</html>