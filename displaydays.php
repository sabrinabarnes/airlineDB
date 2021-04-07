<form action="getflights.php" method="post">
    <?php
    $query = "SELECT * FROM dayOffered GROUP BY day";
    $result = $connection->query($query);
    echo "For which day are you looking to see a flight? </br>";
    while ($row = $result->fetch()) {
        echo '<input type="radio" name="day" value="';
        echo $row["day"];
        echo '">' . $row["day"] . "<br>";
    }
?>

<?php
   $whichDay= $_POST["day"];
   $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
   $result=$connection->query($query);
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td></tr>";
    }
?>

<input type="submit" value="Get Flights">
</form>