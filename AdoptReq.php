
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
  $username = $_POST["username"];
  $password = $_POST["password"];
  $id = $_POST["id"];

  if($username=="")
  {
    echo"Your username is blank, try again.</br>";
  }
  else
  {
    $query = "SELECT username FROM User WHERE username='$username'";
    $result = mysqli_query($mysqli,$query);
    $query2 = "SELECT password FROM User WHERE password='$password'";
    $result2 = mysqli_query($mysqli,$query2);
    $query3 = "SELECT id FROM Animals WHERE id='$id'";
    $result3 = mysqli_query($mysqli,$query3);

    if($result->num_rows == 0 || $result2->num_rows == 0)
    {
      echo "Invalid username or password, try again</br>";
    }
    else if($result3->num_rows == 0 )
    {
      echo "Invalid animal id, try again</br>";
    }
    else
    {
      $sql = "INSERT INTO AdoptionRequests (username, id) VALUES ('$username', '$id')";
      echo "<p>$username has requested to adopt animal with the id $id</p>";
      echo "<p>Information of animal requested:</p>";
      $query5 = "SELECT name, species FROM Animal WHERE id='$id'";
      $result5 = mysqli_query($mysqli,$query5);
      $query6 = "SELECT id FROM AnimalRequests WHERE username='$username'";
      $result6 = mysqli_query($mysqli,$query5);
      echo "<p>Ids of all animals requested by this user:</p>";

      $result = mysqli_query($mysqli,$sql);
      echo "Saved</br>";
    }
  }
  $query = "SELECT username";
  if ($result = $mysqli->query($query))
  {
   /* fetch associative array */
   while ($row = $result->fetch_assoc())
   {
     printf ("%s (%s)\n", $row["username"]);
   }
   /* free result set */
   $result->free();
  }
  /* close connection */
  $mysqli->close();
  ?>
