<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type='text/css' href="style.css">
    <title>Sabrina's Flights-Average Seats</title>
</head>

<?php
include 'connectdb.php';
?>

<h2>Average seats</h2>
The average number of seats on flights being flown on 

<body>
<?php
  $whichDay=$_POST["day"];
  echo $whichDay . " is ";
  $query='SELECT * FROM flight, dayOffered, airplane, airplaneType 
          WHERE flight.airline=dayOffered.airline 
          AND flight.flightNumber=dayOffered.flightNumber
          AND flight.airplane=airplane.airplaneID
          AND airplane.type=airplaneType.apTypeName
          AND dayOffered.day="' . $whichDay . '"';
  $result=$connection->query($query);
  $sum = 0;
  $num_flights = 0;
  while ($row=$result->fetch()) {
    $sum += $row["numSeats"];
    $num_flights++;
  }
  $average = $sum/$num_flights;
  echo $average .".";
?>

<?php
$connection = NULL;
?>
</body>
</html>

