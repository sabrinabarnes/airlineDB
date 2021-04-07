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
    $query = 'SELECT * FROM airline, dayOffered WHERE airline.airlineCode=dayOffered.airlineCode AND dayOffered.airlineCode="' . $whichAirline . ' AND dayOffered.day="' . $whichDay . '"';
    $result=$connection->query($query);
    while ($row=$result->fetch()) {
        if ($numflights == 0) {
            echo "<h2>Flights by " .$row["airlineName"] ." on " .$whichDay .".</h2>";
            echo "<table>";
        }
        echo "<tr><td>".$row["airlineCode"]."</td><td>".$row["flightNumber"]."</td><td>";
        echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
        echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";
        ++$numflights;
    }
    echo "</table>";
    if ($numflights == 0) {echo "There are currently no flights for " . $whichAirline . ".";}
?>

<?php
$connection = NULL;
?>
</body>
</html>