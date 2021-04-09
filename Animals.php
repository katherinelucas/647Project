<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "katielucas", "Pairaiy9",
"katielucas");
/* check connection */
if ($mysqli->connect_errno)
{
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$result = mysqli_query($mysqli,"SELECT * FROM Animals");

echo '<table border=\"1\">';
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>".$row['content']."</td>";
    echo "</tr>";
}
echo '</table>';

 /* free result set */
 $result->free();
}
/* close connection */
$mysqli->close();
?>
