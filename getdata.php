<?php
$result = $connection->query("select * from airline");
while ($row = $result->fetch()) {
	echo "<li>";
	echo $row["airlineName"]."</li>";
}
?>

