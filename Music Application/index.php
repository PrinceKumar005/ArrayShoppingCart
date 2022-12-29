<?php
if (isset($_REQUEST['song'])) {
    $song = $_REQUEST['song'];
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://spotify23.p.rapidapi.com/search/?q=$song&appid=%3CREQUIRED%3E&type=multi&offset=0&limit=10&numberOfTopResults=5",
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
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $response = json_decode($response, true);
        // echo"<pre>";
        // print_r($response);
        // echo"</pre>";
    }
    //  $response['albums']['items'][0]['data']['uri'];

    //     $song= $response['albums']['items'][0]['data']['uri'];
    //     $so=explode(":",$song);
    //     // echo "hello".$so[2];
    //     $current=$so[2];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'>
</head>

<body>
    <header>
        <div class="head">
            <img src="spotify-logo.png" id="logo" alt="" srcset="">
            <ul class=menu>
                <li><a href="#">Premium</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Log IN</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container">
            <form action="" method="post">
                <input type="text" name="song" placeholder="Enter Singer Name to get Song" id="song" autofocus="autofocus">
                <input type="submit" id="search" value="Search" name="search">
            </form>
            <br><br>
            <div class="albumn">
                <?php
                if (isset($_REQUEST['search'])) {

                ?>
                    <table width="100%">
                        <tr>
                            <td>S.no</td>
                            <td>Tittle</td>
                            <td>Album</td>
                            <td>Owner</td>
                        </tr>
                        <?php

                        $count = count($response['playlists']['items']);
                        for ($i = 0; $i < $count; $i++) {
                            $uri = $response['playlists']['items'][$i]['data']['uri'];
                            $uri = explode(":", $uri);
                            $ur = $uri[2];
                        ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td style="color:aliceblue;text-align:left">
                                    <img src="<?php echo $response['playlists']['items'][$i]['data']['images']['items'][0]['sources'][0]['url'] ?>" width="50px" alt="" srcset="">&nbsp;&nbsp;
                                    <?php echo $response['playlists']['items'][$i]['data']['name'] ?>
                                </td>
                                <td>
                                    <a href="https://open.spotify.com/playlist/<?php echo $ur ?>">Click Here</a>
                                </td>
                                <td>
                                    <?php echo $response['playlists']['items'][$i]['data']['owner']['name'] ?>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<h1 style='color:white;text-align:center'>Search a Song</h1>";
                    }
                    ?>
                    </table>
            </div>

        </div>
    </main>
</body>

</html>