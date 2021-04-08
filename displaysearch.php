<form action="getflights.php" method="post">
<link rel="stylesheet" href="style.css" type='text/css'>
<?php
    $whichSearch = $_POST["search"];
    switch ($whichSearch){
        case "day":
            $query = 'SELECT * FROM dayOffered GROUP BY day';
            $result = $connection->query($query);
            echo "For which day are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                echo '<input type="radio" name="day" value="';
                echo $row["day"];
                echo '">' . $row["day"] . "<br>";
            }
            break;
        case "airline":
            $query = 'SELECT * FROM airline';
            $result = $connection->query($query);
            echo "For which airline are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="airline" value="';
                    echo $row["airlineCode"];
                    echo '">' . $row["airlineName"] . "<br>";
            }
            break;
        case "departure":
            $query = 'SELECT * FROM flight, airport WHERE flight.departureAirport=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                echo '<input type="radio" name="departure" value="';
                echo $row["airportCode"];
                echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "arrival":
            $query = 'SELECT * FROM flight, airport WHERE flight.arrivalAirport=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                echo '<input type="radio" name="arrival" value="';
                echo $row["airportCode"];
                echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "airplane":
            $query = 'SELECT * FROM flight, airplane WHERE flight.airplane=airplane.airplaneID GROUP BY airplaneID';
            $result=$connection->query($query);
            echo "For which plane are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                echo '<input type="radio" name="airplane" value="';
                echo $row["airplaneID"];
                echo '">' . $row["airplaneID"] . "<br>";
            }
            break;
        case "all":
            echo "<h3>Here are all available flights.</h3>";
            $query = 'SELECT * from flight';
            $result=$connection->query($query);
            echo "<table>
                <tr>
                    <td>Airline</td>
                    <td>Flight Number</td>
                    <td>Arrival Time</td>
                </tr>";
            while ($row = $result->fetch()) {
                echo "<tr>
                    <td>".$row["airline"]."</td>
                    <td>".$row["flightNumber"]."</td>
                    <td>" .$row["scheduledArrival"]."</td>
                </tr>";
            }
            echo "</table>";
        }
    //echo '<input type="hidden" name="search" value="';
    //echo '">' . $whichSearch . "<br>";
?>
<input type="hidden" name="search" value="<?php echo $whichSearch;?>">
<?php if($whichSearch != "all") {
    echo '<input type="submit" value="Get Flights">';
    } 
?>
</form>