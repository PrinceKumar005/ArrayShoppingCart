<?php
// if(isset($_REQUEST['song']))
// {
//     $song=$_REQUEST['song'];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://spotify23.p.rapidapi.com/search/?q=arjit&appid=%3CREQUIRED%3E&type=multi&offset=0&limit=10&numberOfTopResults=5",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: spotify23.p.rapidapi.com",
            "X-RapidAPI-Key: 48235df41amsha89f454882d6fedp10e585jsna96ab7394e3a"
        ],
    ]);
    
    $response = curl_exec($curl);
    $response=json_decode($response,true);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo"<pre>";
        print_r($response);
        echo"</pre>";
    }
//  $response['albums']['items'][0]['data']['uri'];
                            
//     $song= $response['albums']['items'][0]['data']['uri'];
//     $so=explode(":",$song);
//     // echo "hello".$so[2];
//     $current=$so[2];
// }
?>