<?php

// Sets the timezone.
date_default_timezone_set("Europe/London");
// Required variables
$response = [];
$results = [];
$start = null;
$city = null;



// Statement to check for information in the send
if(isset($_POST['start'], $_POST['city']) && !empty($_POST['start']) && !empty($_POST['city']) && is_numeric($_POST['start'])){

    $start = $_POST['start'];
    $city = $_POST['city'];

    // Get content from the JSON following the same process.
    // Variable names changed in case of conflict.
    $curl = file_get_contents("https://www.gov.uk/api/search.json?q=$city&start=$start");

    // Decoding the JSON.
    $response_decode = json_decode($curl);


    // var_dump($curl); ---- USED FOR TESTING
    // Sets incrementation values on the results.
    for($i = 0; $i < count($response_decode->results); $i++){

        if(!empty($response_decode->results[$i]->public_timestamp)){
            $dateInfo = ($response_decode->results[$i]->public_timestamp);
        } else {
            $dateInfo = "No date info";
        }

        if (!empty($response_decode->results[$i]->description)){
            $description = $response_decode->results[$i]->description;
        } else {
            $description = 'No description';
        }

        // Description variable causes error when comes across JSON without description, commented out
        //$description = $response_decode->results[$i]->description;

        // Creates link variable from JSON results
        $link = $response_decode ->results[$i]->link;

        // Converts date String into date format
        $dateStr = (!empty($response_decode->results[$i]->public_timestamp)) ? $response_decode->results[$i]->public_timestamp : "";

        //Format date
        $formatDate = date("d F Y", strtotime($dateStr));

        // Stores the echo into a variable so it can be passed through.
        $item = '<div class="item"><p>' .$description. ' </p> <p>Link is: <a href="https://gov.uk'. $link .'"> here</a></p> <p> Published date: '.$formatDate.' </p></div>';



        // Find keyword in description before adding to results array

        $strLength = strlen($description);
        $pos = strpos(strtolower($description), "housing");

        if($pos !== false) {
            $results[] = ($item);

        }


    }

    // Stores the incrementation value
    $start = $start + 20;
    // Pushes the results and start array to allow for a print.
    $response = ["success" => true, "message" => $results, "end" => $start];
} else {
    $response = ["success" => false, "message" => "Couldn't fetch data"];
}
// user print
echo json_encode($response);


