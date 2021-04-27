<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$mysqli = new mysqli("mysql.eecs.ku.edu", "katielucas", "oghe7yoL",
"katielucas");
/* check connection */
if ($mysqli->connect_errno)
{
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}
$result = mysqli_query($mysqli,"SELECT * FROM Animals");
$answer1 = $_POST["question-1-ans"];

echo '<table border=\"1\">';
if($answer1 == "C")
{
	$result = mysqli_query($mysqli,"SELECT * FROM Animals");
	while($row = mysqli_fetch_array($result))
	{
    	echo "<tr>";
    	echo "<td>".$row['id']."</td>";
    	echo "<td>".$row['name']."</td>";
    	echo "<td>".$row['cost']."</td>";
    	echo "<td>".$row['age']."</td>";
    	echo "<td>".$row['species']."</td>";
    	echo "</tr>";
	}
	echo '</table>';
}
else if($answer1 == "B")
{
	$result = mysqli_query($mysqli,"SELECT * FROM Animals WHERE species='dog'");
	while($row = mysqli_fetch_array($result))
	{
    	echo "<tr>";
    	echo "<td>".$row['id']."</td>";
    	echo "<td>".$row['name']."</td>";
    	echo "<td>".$row['cost']."</td>";
    	echo "<td>".$row['age']."</td>";
    	echo "<td>".$row['species']."</td>";
    	echo "</tr>";
	}
	echo '</table>';
}
else if($answer1 == "A")
{
	$result = mysqli_query($mysqli,"SELECT * FROM Animals WHERE species='cat'");
	while($row = mysqli_fetch_array($result))
	{
    	echo "<tr>";
    	echo "<td>".$row['id']."</td>";
    	echo "<td>".$row['name']."</td>";
    	echo "<td>".$row['cost']."</td>";
    	echo "<td>".$row['age']."</td>";
    	echo "<td>".$row['species']."</td>";
    	echo "</tr>";
	}
	echo '</table>';
}



 /* free result set */
 $result->free();
}
/* close connection */
$mysqli->close();
?>
