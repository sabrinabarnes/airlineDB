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

<table>
<?php
    $whichDay= $_POST["day"];
    echo "Flights on ".$whichDay.":";
   $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
   $result=$connection->query($query);
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td></tr>";
    }
?>
</table>
<?php
   $connection = NULL;
?>
</body>
</html>

<form action="flightsbyday.php" method="post">
    <?php
   include 'displaydays.php';
    ?>
    <input type="submit" value="Get Flights">
</form>