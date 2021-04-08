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
    $query = 'SELECT * FROM airline';
    $result = $connection->query($query);
    while ($row = $result->fetch()) {
            echo '<input type="radio" name="airline" value="';
            echo $row["airlineCode"];
            echo '">' . $row["airlineName"] . "<br>";
    }
?>

<h3>Select a departure airport:</h3>
<?php
    $query = 'SELECT * FROM airport';
    $result=$connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="departureAirport" value="';
        echo $row["aiportCode"];
        echo '">' . $row["airportName"] . "</br>";
    }   
?>

<h3>Select an arrival airport:</h3>
<?php
    $query = 'SELECT * FROM airport';
    $result=$connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="arrivalAirport" value="';
        echo $row["aiportCode"];
        echo '">' . $row["airportName"] . "</br>";
    }   
?>

<h3>Enter the 3-digit flight number</h3>
<input type="text" name="flightNumber" pattern="[0-9]*" inputmode="numeric">

<h3>Select which days of the week this flight will be offered</h3>
<?php
    $query = "SELECT * FROM dayOffered GROUP BY day";
    $result = $connection->query($query);
    while ($row = $result->fetch()) {
        echo '<input type="checkbox" name="day" value="';
        echo $row["day"];
        echo '">' . $row["day"] . "<br>";
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