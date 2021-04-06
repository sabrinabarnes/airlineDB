<form action="getflights.php" method="post">
<?php
    $whichSearch = $_POST["search"];
    switch ($whichSearch){
        case "day":
            $query = 'SELECT * FROM dayOffered GROUP BY day';
            $result = $connection->query($query);
            echo "For which day are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="day" value="';
                    echo '">' . $row["day"] . "<br>";
            }
            ?>
            <input type="hidden" id="day" name="search" value="day">
            <?php
            break;
        case "airline":
            $query = "SELECT * FROM Airline GROUP BY airlineCode";
            $result = $connection->query($query);
            echo "For which airline are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="airlineCode" value="';
                    echo $row["airlineName"];
                    echo '">' . $row["airlineName"] . "<br>";
            }
            break;
        case "departure":
            $query = 'SELECT * FROM flight, airport WHERE flight.departureAirport=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="departureAirport" value="';
                    echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "arrival":
            $query = 'SELECT * FROM flight, airport WHERE flight.arrival=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="arrivalAirport" value="';
                    echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "airplane":
            $query = 'SELECT * FROM flight, airplane WHERE flight.airplane=airplane.airplaneID GROUP BY airplaneID';
            $result=$connection->query($query);
            echo "For which plane are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="airplaneID" value="';
                    echo '">' . $row["airplaneID"] . "<br>";
            }
            break;
            }
    

?>
<input type="submit" value="Get Flights">
</form>