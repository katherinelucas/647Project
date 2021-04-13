
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

  if($username=="")
  {
    echo"Your username is blank, try again.</br>";
  }
  else
  {
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";
    $result = mysqli_query($mysqli,$query);
    $query2 = "SELECT password FROM Users WHERE password='$password'";
    $result2 = mysqli_query($mysqli,$query2);
    $query3 = "SELECT petid FROM Aniamls WHERE petid='$petid'";
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
      $sql = "INSERT INTO Adopt (user_id) VALUES ('$username')";
      $result = mysqli_query($mysqli,$sql);
      echo "Saved</br>";
      $sql = "INSERT INTO Adopt (petid) VALUES ('$petid')";
      $result = mysqli_query($mysqli,$sql);
      echo "Saved</br>";
    }
  }
  $query = "SELECT user_id";
  if ($result = $mysqli->query($query))
  {
   /* fetch associative array */
   while ($row = $result->fetch_assoc())
   {
     printf ("%s (%s)\n", $row["user_id"]);
   }
   /* free result set */
   $result->free();
  }
  /* close connection */
  $mysqli->close();
  ?>
