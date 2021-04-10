<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights-Add Flight</title>
</head>

<?php
include 'connectdb.php';
?>

<body>
<?php
//airline
if(!empty($_POST['airline'])) { 
    $whichAirline = $_POST["airline"];
} else {
    echo "No airline selected. Please go back and select an airline.</br>";
}
//departure airport
if(!empty($_POST["departureAirport"])) { 
    $whichDeparture = $_POST["departureAirport"];
} else {
    echo "No departure airport selected. Please go back and select a departure airport.</br>";
}
//departure time
if(!empty($_POST["scheduledDeparture"])) { 
    $departureTime = $_POST["scheduledDeparture"];
} else {
    echo "No departure time selected. Please go back and select a departure time.</br>";
}

//arrival airport
if(!empty($_POST['arrivalAirport'])) { 
    $whichArrival = $_POST["arrivalAirport"];
} else {
    echo "No arrival airport selected. Please go back and select a arrival airport.</br>";
}

//arrival time
if(!empty($_POST["scheduledArrival"])) { 
    $arrivalTime = $_POST["scheduledArrival"];
} else {
    echo "No arrival time selected. Please go back and select an arrival time.</br>";
}

//flight number
if(!empty($_POST['flightNumber'])){ 
    $flightNumber = $_POST["flightNumber"];
} else {
    echo "Flight number not entered properly. Please go back and enter a 3-digit flight number.</br>";
}
//airplane ID
if(!empty($_POST['airplane'])){ 
    $airplaneID = $_POST["airplane"];
} else {
    echo "No airplane selected. Please go back and select an airplane ID.</br>";
}
/*days
if(!empty($_POST['days'])){ 
    $whichDays[] = $_POST["days"];
}*/

//echo $whichDays[0];

if(!empty($whichAirline) && !empty($whichDeparture) && !empty($departureTime) 
    && !empty($whichArrival) && !empty($flightNumber) && !empty($airplaneID) ){
    $insert1 = 'INSERT INTO flight values (
                                    "' . $whichAirline . '",
                                    "' . $flightNumber . '",
                                    "' . $airplaneID . '",
                                    "' . $departureTime . '",
                                    "' . $departureTime . '",
                                    "' . $arrivalTime . '",
                                    "' . $arrivalTime . '",
                                    "' . $whichDeparture . '",
                                    "' . $whichArrival. '")';
    $numRows = $connection->exec($insert1);
    echo "<h3>New Flight</h3>";
    echo "<table>
            <tr>
                <td>Airline</td>
                <td>Flight Number</td>
                <td>Airplane Tail Number</td>
                <td>Departure Airport</td>
                <td>Scheduled Departure</td>
                <td>Arrival Airport</td>
                <td>Scheduled Arrival</td>
            </tr>";
    echo "<tr>
        <td>".$whichAirline."</td>
        <td>".$flightNumber."</td>
        <td>".$airplaneID."</td>
        <td>".$whichDeparture."</td>
        <td>".$departureTime."</td>
        <td>".$whichArrival."</td>
        <td>".$arrivalTime."</td>
        <tr>";                
    
    echo "This flight was added";
}

if(!empty($_POST['days'])){
    echo " on ";
    $num_days=0;
    foreach($_POST['days'] as $day){
        if($num_days!=0){echo " and ";}
        $insert2 = 'INSERT INTO dayOffered values ("' . $whichAirline . '",
                                    "' . $flightNumber . '",
                                    "' . $day . '")';

        echo $day;
        $num_days++;
        $numRows = $connection->exec($insert2);
    }
    echo ".";
}
?>
<!--
<form action="getsearch.php" method="post">
<input type="hidden" name="search" value="all">
<input type="submit" value="Click Here to See All Flights">
</form>
-->

<?php
$connection = NULL;
?>
</body>
</html>