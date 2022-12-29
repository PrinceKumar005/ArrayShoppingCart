<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Lets Rock</title>
</head>
<body>
        <!-- <img src="IMAGE/paper.PNG" alt="" sizes="" srcset="">
        <img src="IMAGE/scissor.PNG" alt="" sizes="" srcset="">
        <img src="IMAGE/rock.PNG" alt="" sizes="" srcset=""> -->
        <header>
            <nav id="navbar">
                <div class="logo">
                    <img src="IMAGE/logo.jpg" alt="">
                </div>
                <ul>
                    <li>Lets Play A Game</li>
                </ul>
            </nav>
        </header>
        <main>
            <h1 id=tie>
                Tie 
            </h1>
            <div id="gamearea">
                <div class="game">
                     <div class="computer">
                        <div id="computer"class="play">
                            <?php
                                $random=array("paper2","scissor2","rock2");
                                shuffle($random);
                                // print_r($random);
                            ?>
                                <img id="paper2"src="IMAGE/paper.png"value="0" alt="" sizes="" srcset="">
                                <img id="scissor2" src="IMAGE/scissor.png"value="1" alt="" sizes="" srcset="">
                                <img id="rock2" src="IMAGE/crock.PNG" alt=""value="2" sizes="" srcset="">
                            </div>
                        <img id="computer1"src="IMAGE/crock.PNG" alt="" sizes="" srcset="">
                      </div>
                    <div class="player">
                        <div class="play">
                                <img id="paper1"src="IMAGE/cpaper.PNG"value="0"alt="" sizes="" srcset="">
                                <img id="scissor1" src="IMAGE/cscissor.PNG"value="1" alt="" sizes="" srcset="">
                                <img id="rock1" src="IMAGE/rock.PNG"value="2" alt="" sizes="" srcset="">
                            </div>
                        <img id ="player"src="IMAGE/rock.PNG" alt="" sizes="" srcset="">
                    </div>
                    <div class="button">
                        <button id="rock" onclick="rock()">Rock</button>
                        <button id="paper" onclick="paper()">Paper</button>
                        <button id="scissor" onclick="scissor()">Scissor</button>
                    </div>
                </div>
            </div>
        </main>
        <!-- javascript -->
        <script>
            function rock(){
                document.getElementById("player").style.display="none" ;
                document.getElementById("computer1").style.display="none" ;
                var player = document.getElementById('rock1').style.width="100%";
                var computer = document.getElementById("<?php echo $random[0] ?>").style.width="100%";
                if(player == ){
                    document.getElementById('tie').style.display="block";
                    console.log('hello');
                }
                else{
                    console.log('hell');
                }
                checkwin();
            }
            function paper(){
                document.getElementById("player").style.display="none" ;
                document.getElementById("computer1").style.display="none" ;
                document.getElementById("paper1").style.width="100%";
                document.getElementById("<?php echo $random[0] ?>").style.width="100%";
                checkwin();
            }
            function scissor(){
                document.getElementById("player").style.display="none" ;
                document.getElementById("computer1").style.display="none" ;
                document.getElementById("scissor1").style.width="100%";
                document.getElementById("<?php echo $random[0] ?>").style.width="100%";
                checkwin();
            }
            function checkwin(){
                // if(computer === 'rock1'){
                //     console.log('hello');
                // }
                // else{
                //     console.log('hell');
                // }
            }
        </script>
</body>
</html>
