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
            break;
        case "airline":
            $query = "SELECT * FROM airline GROUP BY airlineCode";
            $result = $connection->query($query);
            echo "For which airline are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="airline_code" value="';
                    echo $row["airlineName"];
                    echo '">' . $row["airlineName"] . "<br>";
            }
            break;
        case "departure":
            $query = 'SELECT * FROM flight, airport WHERE flight.departureAirport=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="departure_airport" value="';
                    echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "arrival":
            $query = 'SELECT * FROM flight, airport WHERE flight.arrival=airport.airportCode GROUP BY airportCode';
            $result=$connection->query($query);
            echo "For which departure city are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="arrival_airport" value="';
                    echo '">' . $row["airportName"] . "<br>";
            }
            break;
        case "airplane":
            $query = 'SELECT * FROM flight, airplane WHERE flight.airplane=airplane.airplaneID GROUP BY airplaneID';
            $result=$connection->query($query);
            echo "For which plane are you looking to see flights? </br>";
            while ($row = $result->fetch()) {
                    echo '<input type="radio" name="airplane_ID" value="';
                    echo '">' . $row["airplaneID"] . "<br>";
            }
            break;
            }
    //echo '<input type="hidden" name="search" value="';
    //echo '">' . $whichSearch . "<br>";
?>
<input type="hidden" name="search" value="<?php echo $whichSearch;?>">
<input type="submit" value="Get Flights">
</form>