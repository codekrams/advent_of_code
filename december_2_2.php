<?php
$strategy= file_get_contents('strategy_input_live.txt');

$rounds = explode("\n", $strategy);
$strategy_rounds = [];
$score_rounds = [];
foreach($rounds as $key => $round){
    $strategy_rounds[] = explode(" ", $round);
}
foreach($strategy_rounds as $key=>$strategy_round){
    $score_rounds[] = getScore($strategy_round);
}
var_dump($score_rounds);
echo "The score is " . array_sum($score_rounds);

function getScore($round){
    $oponent = $round[0];
    $outcome = $round[1];



    $score = 0;
     switch($outcome){
         case "X":
             $score += 0;
             break;
         case "Y":
             $score += 3;
             break;
         case "Z":
             $score += 6;
             break;
     }

     $score += getWinnerScore($oponent, $outcome);
    return $score;
}

function getWinnerScore($enemy, $outcome){

    switch($enemy){
        case "A":
            if ($outcome === "X"){
                return 3;
            }
            if ($outcome === "Y"){
                return 1;
            }
            if ($outcome === "Z"){
                return 2;
            }
            break;
        case "B":
            if ($outcome === "X"){
                return 1;
            }
            if ($outcome === "Y"){
                return 2;
            }
            if ($outcome === "Z"){
                return 3;
            }
            break;
        case "C":
            if ($outcome === "X"){
                return 2;
            }
            if ($outcome === "Y"){
                return 3;
            }
            if ($outcome === "Z"){
                return 1;
            }
            break;
    }
}