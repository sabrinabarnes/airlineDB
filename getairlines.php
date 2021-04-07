<?php
$result = $connection->query("select * from airline");
echo "<table>";
while ($row = $result->fetch()) {
echo "<tr>
	<td>".$row["airlineCode"]."</td>
	<td>".$row["airlineName"]."</td>
	</tr>";
}
echo "</table>"
?>

