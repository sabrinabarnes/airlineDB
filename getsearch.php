<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>Sabrina's Flights-Flight Search/title>
</head>
<body>
<?php
include 'connectdb.php';
?>

<h1>Flight options</h1>
<?php
$whichSearch = $POST["search"];
include 'displaysearch.php';
?>

<?php
   $connection = NULL;
?>
</body>
</html>