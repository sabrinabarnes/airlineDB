<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights</title>
</head>

<body>
<?php
$whichAirline = $_POST["airline"];
$whichDeparture = $_POST["departureAirport"];
$whichArrival = $_POST["arrivalAirport"];
$flightNumber = $_POST["flightNumber"];
$whichDays = $_POST["day"];

$query = 'SELECT * FROM flight';
$row=$result->fetch();
$newkey = intval($row["maxid"]) + 1;
$petid = (string)$newkey;
$query2 = 'INSERT INTO pet values("' . $petid . '","' . $petName . '","' . $species . '","' . $whichOwner . '")';
$numRows = $connection->exec($query2);
echo "This flight was added!";
?>

<?php
$connection = NULL;
?>
</body>
</html>