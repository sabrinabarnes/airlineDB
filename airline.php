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

<div class="header">
<div class="sky-image">
  <div class="heading-text">
    <h1>Welcome to Sabrina's Flights</h1>
  </div>
</div>
</div>

<img src="plane.jpg" align="right">
<h2>Find flights by airline code and day</h2>
<h3>Airlines we offer</h3>

<?php
include 'getairlines.php';
?>

</br>
<form action="getflightsbyairline.php" method="post">
    <label for="airlineCode">Airline Code</label>
    <input type="text" id="airlineCode" name="airlineCode"></br>
    <label for="day">Day of the Week</label>
    <input type="text" id="day" name="day"></br>
<input type="submit" value="Find Flights">
</form>

<h2>New Flight Entry</h2>
<form action="newflight.php" method="post">
<input type="submit" value="Click Here to Enter a New Flight">
</form>

<h2>Update Actual Departure Time</h2>
<form action="updatedeparture.php" method="post">
<input type="submit" value="Click Here to Update the Departure Time of a Flight">
</form>

<h2>Calculate average number of seats on a day</h2>
<h3>Select a day</h3>
<form action="calculateseats.php" method="post">
  <?php
  $query = 'SELECT * FROM dayOffered GROUP BY day';
  $result = $connection->query($query);
  echo "For which day are you looking to see flights? </br>";
  while ($row = $result->fetch()) {
      echo '<input type="radio" name="day" value="';
      echo $row["day"];
      echo '">' . $row["day"] . "<br>";
  }

  ?>
  <input type="submit" id="submit" value="Calculate average seats">
</form>

<?php

?>

<h2>Flight Search</h2>
<h3>How would you like to search for a flight</h3>

<form action="getsearch.php" method="post">
<table>
<input type="radio" id="day" name="search" value="day">
<label for="day">By day</label><br>
<input type="radio" id="airline" name="search" value="airline">
<label for="airline">By airline</label><br>
<input type="radio" id="departure" name="search" value="departure">
<label for="departure">By departure city</label><br>
<input type="radio" id="arrival" name="search" value="arrival">
<label for="arrival">By arrival city</label><br>
<input type="radio" id="airplane" name="search" value="airplane">
<label for="airplane">By airplane tail number</label><br>
<input type="radio" id="all" name="search" value="all">
<label for="all">See all available flights</label><br>
</table>

<input type="submit" value="Submit">
</form>

<?php
$connection = NULL;
?>
</body>
</html>




