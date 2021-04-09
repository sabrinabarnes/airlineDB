<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights-Update Arrival</title>
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
    echo $row["airline"] . '","' . $row["flightNumber"];
    echo '">' . $row["airline"] . " " .$row["flightNumber"] . "<br>";
    //echo '<input type="hidden" name="flightNumber" value="'.$row["flightNumber"].'">';
}
?>
<h3>Select the actual departure time for this flight:</h3>
<input type="time" id="departure" name ="departure">
<input type="submit" name="submit" value="Submit">
</form>

<?php
$actualDeparture=$_POST["departure"];
$whichFlight=$_POST["flight"];
//$flightNumber=$_POST["flightNumber"];

if(isset($_REQUEST["submit"])){
    $update = 'UPDATE flight
            SET actualDeparture="' . $actualDeparture . '" 
            WHERE airline="' . $whichFlight[0] . '" AND flightNumber="' . $whichFlight[1] . '"';
    $numRows = $connection->exec($update);
    echo "The departure time of flight " . $whichFlight[0] .$whichFlight[1] . " was updated.";
}
?>

<?php
$connection = NULL;
?>
</body>
</html>