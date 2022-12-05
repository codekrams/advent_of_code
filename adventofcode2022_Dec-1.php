<?php
$calories = file_get_contents('calorie_input.txt');

$calorie_array = explode("\n\n", $calories);
$calorie_sum = [];
foreach($calorie_array as $key=>$calorie){
    $calorie_sum[] = array_sum(explode("\n", $calorie));
}
echo "The amount of the highest calories: " . max($calorie_sum) . "\n";
rsort($calorie_sum);
$top3 = array_sum(array_slice($calorie_sum, 0, 3));
echo "The amount of the top 3 calories in total: " . $top3;
