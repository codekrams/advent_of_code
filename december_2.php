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

echo "The score is " . array_sum($score_rounds);

function getScore($round){
    $oponent = $round[0];
    $self = $round[1];

    $score = 0;
     switch($self){
         case "X":
             $score += 1;
             break;
         case "Y":
             $score += 2;
             break;
         case "Z":
             $score += 3;
             break;
     }

     $score += getWinnerScore($oponent, $self);
    return $score;
}

function getWinnerScore($enemy, $self){

    switch($self){
        case "X":
            if ($enemy === "C"){
                return 6;
            }
            if ($enemy === "A"){
                return 3;
            }
            if ($enemy === "B"){
                return 0;
            }
            break;
        case "Y":
            if ($enemy === "A"){
                return 6;
            }
            if ($enemy === "B"){
                return 3;
            }
            if ($enemy === "C"){
                return 0;
            }
            break;
        case "Z":
            if ($enemy === "B"){
                return 6;
            }
            if ($enemy === "C"){
                return 3;
            }
            if ($enemy === "A"){
                return 0;
            }

            break;
    }
}