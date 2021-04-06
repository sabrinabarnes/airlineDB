<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sabrina's Flights</title>
</head>

<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to Sabrina's Flights</h1>
<h2>Airlines we offer</h2>

<form action="getsearch.php" method="post">

<h3>How would you like to search for a flight</h3>
<input type="radio" id="day" name="search" value="day">
<label for="day">By day</label><br>
<input type="radio" id="airline" name="search" value="airline">
<label for="airline">By airline</label><br>
<input type="radio" id="departure" name="search" value="departure">
<label for="departure">By departure city</label><br>
<input type="radio" id="arrival" name="search" value="arrival">
<label for="arrival">By arrival city</label><br>
<input type="radio" id="airplane" name="search" value="airplane">
<label for="airplane">By airplane type</label><br>

<input type="submit" value="Submit">
</form>

<?php
$connection = NULL;
?>
</body>
</html>




