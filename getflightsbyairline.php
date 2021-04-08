<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights</title>
</head>

<body>
<?php
include 'connectdb.php';
?>

<?php
    $whichAirline = $_POST["airlineCode"];
    $whichDay = $_POST["day"];
    $numflights = 0;
    $query = 'SELECT * FROM flight, airline, dayOffered WHERE flight.airline=airline.airlineCode AND airline.airlineCode=dayOffered.airline 
                AND flight.airline="' . $whichAirline . '"  AND dayOffered.day ="'. $whichDay . '"';
    $result=$connection->query($query);
    while ($row=$result->fetch()) {
        if ($numflights == 0) {
            echo "<h2>Flights by " .$row["airlineName"] ." (".$whichAirline.") on " .$whichDay .".</h2>";
            echo "<table>
                <tr>
                    <td>Airline</td>
                    <td>Flight Number</td>
                    <td>Departure Location</td>
                    <td>Arrival Location</td>
                </tr>";
        }
        echo "<tr>
            <td>".$row["airlineCode"]."</td>
            <td>".$row["flightNumber"]."</td>
            <td>".$row["departureAirport"]."</td>
            <td>".$row["arrivalAirport"]."</td>"; //change to airport name
        ++$numflights;
    }
    echo "</table>";
    if ($numflights == 0) {
        echo "There are currently no flights to display.";
    }
?>

<?php
$connection = NULL;
?>
</body>
</html>