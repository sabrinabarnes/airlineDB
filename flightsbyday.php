<?php
   $whichDay= $_POST["day"];
   $query = 'SELECT * FROM dayOffered, flight WHERE flight.airline=dayOffered.airline AND flight.flightNumber=dayOffered.flightNumber AND dayOffered.day="' . $whichDay . '"';
   $result=$connection->query($query);
    while ($row=$result->fetch()) {
	echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td></tr>";
    }
?>
