<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights</title>
</head>

<body>
<?php
//airline
if(!empty($_POST['airline'])) { 
    $whichAirline = $_POST["airline"];
} else {
    echo "No airline selected. Please go back and select an airline.</br>";
}
//departure airport
if(!empty($_POST['departureAirport'])) { 
    $whichDeparture = $_POST["departureAirport"];
} else {
    echo "No departure airport selected. Please go back select a departure airport.</br>";
}
//departure time
if(!empty($_POST['departureTime'])) { 
    $departureTime = $_POST["departureTime"];
} else {
    echo "No departure time selected. Please go back and select a departure time.</br>";
}
//arrival airport
if(!empty($_POST['arrivalAirport'])) { 
    $whichArrival = $_POST["arrivalAirport"];
} else {
    echo "No arrival airport selected. Please go back and select a arrival airport.</br>";
}
//flight number
if(!empty($_POST['flightNumber'])){ 
    $flightNumber = $_POST["flightNumber"];
} else {
    echo "Flight number not entered properly. Please go back and enter a 3-digit flight number.</br>";
}
//airplane ID
if(!empty($_POST['airplane'])){ 
    $flightNumber = $_POST["airplane"];
} else {
    echo "No airplane selected. Please go back and select an airplane ID.</br>";
}
//days
if(!empty($_POST['days'])){ 
    $whichDays = $_POST["days"];
} else {
    echo "No departure time selected. Please go back and select a departure time.</br>";
}


$sql = 'INSERT INTO flight values ("' . $whichAirline . '",
                                    "' . $flightNumber . '",
                                    "' . $whichPlane . '",
                                    "' . $scheduledDeparture . '",
                                    "' . $scheduledDeparture . '",
                                    "' . $scheduledArrival . '",
                                    "' . $scheduledArrival . '",
                                    "' . $whichDeparture . '",
                                    "' . $whichArrival. '")';


$query = 'SELECT * FROM flight';
$row=$result->fetch();
$newkey = intval($row["maxid"]) + 1;
$petid = (string)$newkey;
$query2 = 'INSERT INTO pet values("' . $petid . '","' . $petName . '","' . $species . '","' . $whichOwner . '")';
$numRows = $connection->exec($query2);
echo "This flight was added!";
?>

<?php
$connection = NULL;
?>
</body>
</html>