<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sabrina's Flights-Flights on this Day</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the flights available:</h1>
<table>
<?php
    session_start();
    $whichSearch = $_POST["search"];    
    switch ($whichSearch){
        case "day":
            $whichDay= $_POST["day"];
            echo "Flights on ".$whichDay;
            $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
            echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td></tr>";
            }
            break;
        case "airline":
            include 'displayairlines.php';
            break;
        case "departure":
            include 'displaydepartures.php';
            break;
        case "arrival":
            include 'displayarrivals.php';
            break;
        }
?>
</table>


<?php
   $connection = NULL;
?>
</body>
</html>