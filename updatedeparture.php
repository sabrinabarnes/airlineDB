<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights-Update Departure</title>
</head>

<?php
include 'connectdb.php';
?>

<body>
<h1>Update Actual Departure Time</h1>
<h3>Select for which flight you would like to update the departure time:</h3>
<form action="" method="post">
<?php
$query = 'SELECT * FROM flight';
$result = $connection->query($query);
while ($row = $result->fetch()) {
    echo '<input type="radio" id="flight" name="flight" value="';
    echo $row["airline"];
    echo $row["flightNumber"];
    echo '">' . $row["airline"] . " " .$row["flightNumber"] . "<br>";
}
?>
<h3>Select the actual departure time for this flight:</h3>
<input type="time" id="departure" name ="departure">
<input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_REQUEST["submit"])){
    $actualDeparture=$_POST["departure"];
    $flight=$_POST["flight"];
    $airline=substr($flight,0,2);
    $flightNumber=substr($flight,2);
    $update = 'UPDATE flight
            SET actualDeparture="' . $actualDeparture . '" 
            WHERE airline="' .$airline. '" AND flightNumber="' . $flightNumber . '"';
    $numRows = $connection->exec($update);
    echo "The departure time of flight " . $airline . " " . $flightNumber . " was updated.";
}
?>

<?php
$connection = NULL;
?>
</body>
</html>