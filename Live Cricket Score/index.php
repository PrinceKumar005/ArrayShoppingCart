<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/recent",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
        "X-RapidAPI-Key: 48235df41amsha89f454882d6fedp10e585jsna96ab7394e3a"
    ],
]);

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // echo "<pre>";
    // print_r($response);
    // echo "</pre>";
    $count = count($response);
}

// $curl = curl_init();

// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/matches/v1/recent",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
// 		"X-RapidAPI-Key: daed59fa31msha5b261c8a576c1dp124a4ejsn707f2cb1a129"
// 	],
// ]);

// $response = curl_exec($curl);
// $response=json_decode($response,true);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
// 	echo "cURL Error #:" . $err;
// } else {
// 	// echo "<pre>";
//     // print_r($response);
//     $count=count($response);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricbuzz</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="head">
            <img src="images.jfif" alt="" srcset="">
        </div>
    </header>
    <div class="header">
        hdchwoih
    </div>
    <h2>
        Cricket Score Are There
    </h2>
    <main>
        <div class="main">
            <?php
            for ($i = 0; $i < $count; $i++) {
                if ($i == 1) {
                    $i = 2;
                }
                echo "<h1>" . $response['typeMatches'][$i]['matchType'] . "</h1>";
                $count1 = count($response['typeMatches'][$i]['seriesMatches']);
                for ($j = 0; $j < $count1; $j++) {
                    if ($j == 1) {
                        $j = 2;
                    }
                    $count2 = count($response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches']);
                    for ($k = 0; $k < $count2; $k++) {



            ?>
                        <a href="scorecard.php?matchId=<?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['matchId']  ?>">
                            <div class="match">
                                <h3>
                                    <?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['seriesName'] ?>
                                </h3>
                                <label for="">Match Type: <b><?php echo $response['typeMatches'][$i]['matchType'] ?></b></label><br>
                                <label for="">Series Name: <b><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['seriesName'] ?></b></label>
                                <br>
                                <div class="score" style="text-align:center">
                                    <label for="" style=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['team1']['teamName'] ?></label> <b>V/S</b>
                                    <label for=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['team2']['teamName'] ?></label>
                                    <br><br>
                                    <label for="" style=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['team1']['teamSName'] ?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['team2']['teamSName'] ?></label>
                                    <br>
                                    <label for="" style=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team1Score']['inngs1']['runs'] ?>/<?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team1Score']['inngs1']['wickets'] ?>(<?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team1Score']['inngs1']['overs'] ?>)</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label for=""><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team2Score']['inngs1']['runs'] ?>/
                                        <?php if (isset($response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team2Score']['inngs1']['wickets'])) {
                                            echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team2Score']['inngs1']['wickets'];
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                        (<?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchScore']['team2Score']['inngs1']['overs'] ?>)</label>
                                    <br><br>
                                    <label for="" style="color:blue;"><?php echo $response['typeMatches'][$i]['seriesMatches'][$j]['seriesAdWrapper']['matches'][$k]['matchInfo']['status'] ?></label>
                                </div>
                            </div>
                        </a>
            <?php
                    }
                    echo "<br>";
                }
            }
            ?>
        </div>
    </main>
</body>

</html>