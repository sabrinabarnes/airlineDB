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

<h1>Here are the flight options:</h1>
<?php
$whichSearch = $POST["search"];
include 'display.php';
?>

<?php
   $connection = NULL;
?>
</body>
</html>