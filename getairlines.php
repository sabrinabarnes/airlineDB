<?php
$result = $connection->query("SELECT * FROM airline");
echo "<table>";
while ($row = $result->fetch()) {
echo "<tr>
	<td>".$row["airlineCode"]."</td>
	<td>".$row["airlineName"]."</td>
	</tr>";
}
echo "</table>"
?>

