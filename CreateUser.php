
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
  $username = $_POST["username"];

  if($username=="")
  {
    echo"Your username is blank, try again.</br>";
  }
  else
  {
    $query = "SELECT user_id FROM Users WHERE user_id='$username'";
    $result = mysqli_query($mysqli,$query);

    if($result->num_rows != 0)
    {
      echo "Invalid username, this one already exists, try again</br>";
    }
    else
    {
      $sql = "INSERT INTO Users (user_id) VALUES ('$username')";
      $result = mysqli_query($mysqli,$sql);
      echo "Saved</br>";
      $sql = "INSERT INTO Users (password) VALUES ('$password')";
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
