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
            echo "Flights on ".$whichDay;
            $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
                echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
                echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
                echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";                
                ++$numflights;
            }
            if ($numflights == 0) {echo "There are currently no flights on " . $whichDay . ".";}
            break;

        case "airline":
            $whichAirline= $_POST["airline"];
            $query = 'SELECT * FROM airline, flight WHERE flight.airline=airline.airlineCode AND flight.airline="' . $whichAirline . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
                echo "Flights by ".$row["airlineName"]."<br>";
                echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
                echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
                echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";
                ++$numflights;
            }
            if ($numflights == 0) {echo "There are currently no flights for " . $whichAirline . ".";}
            break;

        case "departure":
            $whichDeparture= $_POST["departure"];
            $query = 'SELECT * FROM flight, airport WHERE flight.departureAirport=airport.airportCode AND departureAirport="' . $whichDeparture . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
                //if ($numflights == 0) {echo "Flights leaving from ".$row["airportName"]." (".$whichDeparture.")<br>";}
                echo "<tr> <td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
                echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
                echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";
                ++$numflights;
            }
            if ($numflights == 0) {echo "There are currently no flights leaving from " . $whichDeparture . ".";}
            break;

        case "arrival":
            $whichArrival= $_POST["arrival"];
            $query = 'SELECT * FROM flight, airport WHERE flight.arrivalAirport=airport.airportCode AND arrivalAirport="' . $whichArrival . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
                if ($numflights == 0) {echo "Flights arriving at ".$row["airportName"]." (".$whichArrival.")<br>";}
                echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
                echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
                echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";
                ++$numflights;
            }
            if ($numflights == 0) {echo "There are currently no flights leaving from " . $whichArrival . ".";}
            break;

        case "airplane":
            $whichAirplane= $_POST["airplane"];
            $query = 'SELECT * FROM airplane, flight WHERE flight.airplane=airplane.airplaneID AND airplane.airplaneID="' . $whichAirplane . '"';
            $result=$connection->query($query);
            while ($row=$result->fetch()) {
                if ($numflights == 0) {
                    echo "<h2>Flights using airplane ".$whichAirplane."<br></h2>";
                    echo "<table>
                    <tr>
                        <td>Airline</td>
                        <td>Flight Number</td>
                        <td>Airplane ID</td>
                        <td>Departure Airport</td>
                        <td>Scheduled Departur</td>
                        <td>Arrival Airport</td>
                        <td>Scheduled Arrival</td>";
                }
                echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
                echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
                echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";
                ++$numflights;
            }
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