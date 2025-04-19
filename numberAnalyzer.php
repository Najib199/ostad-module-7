<?php 
function validateNumbers($input) {
    $numbers = explode(' ',$input);
    $validateNumbers = [];

    foreach ($numbers as $num){
        if (!is_numeric($num)){
            return false;
        }
        $validateNumbers[] = floatval($num);
    }
    return $validateNumbers;
}

function analyzeNumbers($numbers) {
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    $avg = $sum / count($numbers);

    return[
        'max' => $max,
        'min' => $min,
        'sum' => $sum,
        'avg' => $avg
    ];

}

function displayResults($results) {
    echo "\n=== Results ===\n";
    echo "Maximum: " .$results['max'] . "\n";
    echo "Minimum: " .$results['min'] . "\n";
    echo "Sum: " .$results['sum'] . "\n";
    echo "Average: " . number_format($results['avg'], 2) . "\n";
}

echo "Number Analysis Program \n";
echo "Enter 'exit' to quit at any time.\n";

while (true){
    echo "\n Enter a list of numbers seperated by speces (or type 'exit' to quit): ";
    $input = trim(fgets(STDIN)); //Reads input from the command line

    if (strtolower($input) === 'exit') {
        echo "Exiting program. Goodbye! \n";
        break;
    }

$numbers = validateNumbers($input);



if ($numbers === false) {
    echo "Error: Invalid or empty input. Please enter Numbers only, Seperated by spaces.\n";
    continue;
}

if (empty($numbers)) {
    echo "Error: No numbers entered . Please try again .\n";
    continue;
}

$results = analyzeNumbers($numbers);
displayResults($results);

}
