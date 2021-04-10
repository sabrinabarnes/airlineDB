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

<h2>Information entry to input a new flight</h2>

<form action="addnewflight.php" method="post">
<h3>Select an airline:</h3>
<?php
    $query = 'SELECT * FROM airline ORDER BY airlineName';
    $result = $connection->query($query);
    while ($row = $result->fetch()) {
            echo '<input type="radio" name="airline" value="';
            echo $row["airlineCode"];
            echo '">' . $row["airlineName"] . "<br>";
    }
?>

<h3>Select a departure airport:</h3>
<?php
    $query = 'SELECT * FROM airport ORDER BY airportName';
    $result=$connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="departureAirport" value="';
        echo $row["airportCode"];
        echo '">' . $row["airportName"] . "</br>";
    }   
?>

<h3>Select a departure time:</h3>
<input type="time" id="scheduledDeparture" name ="scheduledDeparture">

<h3>Select an arrival airport:</h3>
<?php
    $query = 'SELECT * FROM airport ORDER BY airportName';
    $result=$connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="arrivalAirport" value="';
        echo $row["airportCode"];
        echo '">' . $row["airportName"] . "</br>";
    }   
?>

<h3>Select an arrival time:</h3>
<input type="time" id="scheduledArrival" name ="scheduledArrival">

<h3>Enter the 3-digit flight number:</h3>
<input type="number" name="flightNumber" pattern="[0-9]*" inputmode="numeric">

<h3>Select an airplane for this flight:</h3>
<?php
    $query = 'SELECT * FROM airplane';
    $result=$connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="airplane" value="';
        echo $row["airplaneID"];
        echo '">' . $row["airplaneID"] .  "<br>";
    }
?>

<h3>Select which days of the week this flight will be offered:</h3>
<?php
    $query = 'SELECT * FROM dayOffered GROUP BY day';
    $result = $connection->query($query);
    //$i=0;
    while ($row = $result->fetch()) {
        echo '<input type="checkbox" id="'.$row["day"].'" name="days[]" value="';
        echo $row["day"];
        echo '">' . $row["day"] . "<br>";
        //$i++;
    }
?>

</br>
<input type="submit" value="Add New Flight">
</form>

<?php
$connection = NULL;
?>
</body>
</html>