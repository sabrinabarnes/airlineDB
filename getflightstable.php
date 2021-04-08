<?php
$numflights = 0;
$result=$connection->query($query);
    while ($row=$result->fetch()) {
        if($numflights == 0) {
            echo "<table>
            <tr>
                <td>Airline</td>
                <td>Flight Number</td>
                <td>Airplane Tail Number</td>
                <td>Departure Airport</td>
                <td>Scheduled Departure</td>
                <td>Arrival Airport</td>
                <td>Scheduled Arrival</td>
            </tr>";
        }
        echo "<tr><td>".$row["airline"]."</td><td>".$row["flightNumber"]."</td><td>";
        echo $row["airplane"]."</td><td>".$row["departureAirport"]."</td><td>".$row["scheduledDeparture"]."</td><td>";
        echo $row["arrivalAirport"]."</td><td>".$row["scheduledArrival"]."</td><tr>";                
        ++$numflights;
    }
?>