<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" type='text/css'>
<title>Sabrina's Flights-Flights on this Day</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here are the flights</h1>
<table>
<?php
    $whichSearch = $_POST["search"]; 
    $numflights = 0;
    switch ($whichSearch){
        case "day":
            $whichDay= $_POST["day"];
            $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
            echo "<h3>Flights on ".$whichDay."</h3>";
            include 'getflightstable.php';
            if ($numflights == 0) {echo "There are currently no flights on " . $whichDay . ".";}
            break;

        case "airline":
            $whichAirline= $_POST["airline"];
            $query = 'SELECT * FROM airline, flight WHERE flight.airline=airline.airlineCode AND flight.airline="' . $whichAirline . '"';
            echo "<h3>Flights by ".$whichAirline."</h3>";
            include 'getflightstable.php';
            if ($numflights == 0) {echo "There are currently no flights by " . $whichAirline . ".";}
            break;

        case "departure":
            $whichDeparture= $_POST["departure"];
            $query = 'SELECT * FROM flight, airport WHERE flight.departureAirport=airport.airportCode AND departureAirport="' . $whichDeparture . '"';
            echo "<h3>Flights leaving from ".$whichDeparture."</h3>";
            include 'getflightstable.php';
            if ($numflights == 0) {echo "There are currently no flights leaving from " . $whichDeparture . ".";}
            break;

        case "arrival":
            $whichArrival= $_POST["arrival"];
            $query = 'SELECT * FROM flight, airport WHERE flight.arrivalAirport=airport.airportCode AND arrivalAirport="' . $whichArrival . '"';
            echo "<h3>Flights arriving at ".$whichArrival."<br></h2>";
            include 'getflightstable.php';
            if ($numflights == 0) {echo "There are currently no flights leaving from " . $whichArrival . ".";}
            break;

        case "airplane":
            $whichAirplane= $_POST["airplane"];
            $query = 'SELECT * FROM airplane, flight WHERE flight.airplane=airplane.airplaneID AND airplane.airplaneID="' . $whichAirplane . '"';
            echo "<h3>Flights using airplane ".$whichAirplane."<br></h3>";
            include 'getflightstable.php';
            if ($numflights == 0) {echo "There are no currently flights using " . $whichAirplane . ".";}
            break;                
        }
        
?>
</table>


<?php
   $connection = NULL;
?>
</body>
</html>