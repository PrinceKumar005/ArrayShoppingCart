<?php

$curl = curl_init();
$matchid=$_REQUEST['matchId'];

curl_setopt_array($curl, [
	CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchid/hscard",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
		"X-RapidAPI-Key: daed59fa31msha5b261c8a576c1dp124a4ejsn707f2cb1a129"
	],
]);

$response = curl_exec($curl);
$response=json_decode($response,true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	// echo "<pre>";
    // print_r($response);
    // $count=count($response);
}
// $curl = curl_init();
// $matchid=$_REQUEST['matchId'];
// curl_setopt_array($curl, [
// 	CURLOPT_URL => "https://cricbuzz-cricket.p.rapidapi.com/mcenter/v1/$matchid/hscard",
// 	CURLOPT_RETURNTRANSFER => true,
// 	CURLOPT_FOLLOWLOCATION => true,
// 	CURLOPT_ENCODING => "",
// 	CURLOPT_MAXREDIRS => 10,
// 	CURLOPT_TIMEOUT => 30,
// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 	CURLOPT_CUSTOMREQUEST => "GET",
// 	CURLOPT_HTTPHEADER => [
// 		"X-RapidAPI-Host: cricbuzz-cricket.p.rapidapi.com",
// 		"X-RapidAPI-Key: 41966c2f86mshcbf288416a468e0p162761jsncd9271762498"
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
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scorecard</title>
    <link rel="stylesheet" href="score1.css">
</head>
<body>
    
    <main>
        <div class="scorecard">
            <div class="container">
                <h1>
                    <?php echo $response['scoreCard'][0]['batTeamDetails']['batTeamName'] ?>
                   v/s
                   <?php echo $response['scoreCard'][1]['batTeamDetails']['batTeamName'] ?>
                   ,
                   <?php echo $response['matchHeader']['matchDescription'] ?>
                    - Live Cricket Score, Commentary
                </h1>
                <label for=""><b>Series:</b>    <?php echo $response['matchHeader']['seriesDesc'] ?></label>
                <label for="">
                    Date & Time :   <?php 
                    $timestamp = $response['scoreCard'][0]['timeScore'];
                    $date = Date('M d ,h:i A', $timestamp);
                    echo $date 
                    ?>
                </label>
                <label for=""><b>TOSS : </b><?php echo $response['matchHeader']['status'] ?> First</label>
                <br><br>
                <hr width="1000px">
                <h3>
                     <?php echo $response['matchHeader']['result']['winningTeam']." Won by ".   $response['matchHeader']['result']['winningMargin']; 
                     if($response['matchHeader']['result']['winByRuns'] == 1)
                     {
                        echo " Runs";
                     }
                     else{
                        echo " Wickets";
                     }
                     ?>
                </h3>
            </div>
            <div class="scoreboard">
            <?php
                        for($i=0;$i<2;$i++)
                        {

                        
                    ?>
                <div class="head">
                    <h2>
                      <?php echo $response['scoreCard'][$i]['batTeamDetails']['batTeamName'] ?>
                      Innings
                       <span>
                       <?php echo $response['scoreCard'][$i]['scoreDetails']['runs'] ." / ". $response['scoreCard'][$i]['scoreDetails']['wickets'] ?> (
                       <?php echo $response['scoreCard'][$i]['scoreDetails']['overs'] ?> 
                       )
                       </span>
                    </h2>
                   
                    <table border="1"width="85%"style="text-align:center;font-size:20px">
                        <tr style="background-color:white;padding:5px">
                            <td colspan="2">Batter</td>
                            <td>R</td>
                            <td>B</td>
                            <td>4s</td>
                            <td>6s</td>
                            <td colspan="6">SR</td>
                        </tr>
                        <?php
                            for($m=1;$m<=11;$m++)
                            {

                            
                        ?>
                        <tr>
                            <td style="color:blue;font-size:20px"><?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['batName'] ?></td>
                            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;             <td> <span style="color:black"><?php if($response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['outDesc'] == null)
                            {
                                echo "Did not Bat";
                            }
                            else{
                                echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['outDesc'];
                                
                            }
                             ?>  </span>    
                        </td>
                        
                        <td>
                         <?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['runs']?>
                        </td>
                        <td>
                         <?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['balls']?>
                        </td>
                        <td>
                         <?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['boundaries']?>
                        </td>
                        <td>
                         <?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['sixers']?>
                        </td>
                       
                        <td colspan="2">
                         <?php echo $response['scoreCard'][$i]['batTeamDetails']['batsmenData']['bat_'.$m]['strikeRate']?>
                        </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="2">
                                Extras


                                
                            </td>
                            <td colspan="6">
                            <?php echo $response['scoreCard'][$i]['extrasData']['total'] ?> 
                            (b <?php echo $response['scoreCard'][$i]['extrasData']['byes'] ?> ,lb <?php echo $response['scoreCard'][$i]['extrasData']['legByes'] ?>, w <?php echo $response['scoreCard'][$i]['extrasData']['wides'] ?>,nb <?php echo $response['scoreCard'][$i]['extrasData']['noBalls'] ?>,p <?php echo $response['scoreCard'][0]['extrasData']['penalty'] ?>)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Total
                            </td>
                            <td colspan="6">
                            <?php echo $response['scoreCard'][$i]['scoreDetails']['runs']?>
                             (<?php echo $response['scoreCard'][$i]['scoreDetails']['wickets']  ?> Wickets ,<?php echo $response['scoreCard'][$i]['scoreDetails']['overs'] ?> Overs)
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <table border="1"width="85%"style="text-align:center;font-size:20px">
                        <tr style="background-color:white;padding:5px">
                            <td colspan="">Bowler</td>
                            <td>O</td>
                            <td>M</td>
                            <td>R</td>
                            <td>W</td>
                            <td>NB</td>
                            <td>WD</td>
                            <td>ECO</td>
                        </tr>
                        <?php
                        $count=count($response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']);
                            for($m=1;$m<=$count;$m++)
                            {

                           
                        ?>
                        <tr>
                        <td style="color:blue;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['bowlName'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['overs'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['maidens'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['runs'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['wickets'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['no_balls'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['wides'] ?></td>
                        <td style="color:;font-size:20px"><?php echo $response['scoreCard'][$i]['bowlTeamDetails']['bowlersData']['bowl_'.$m]['economy'] ?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    
                    
                </div>
                <?php
                        }
                ?>
            </div>
        </div>
    </main>
</body>
</html>