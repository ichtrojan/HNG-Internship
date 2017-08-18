<!DOCTYPE html>
<html>
  <head>
    <title>View Records</title>
  </head>
<body>
<?php
include('db-connect.php');

$result = mysql_query("SELECT * FROM players")or die(mysql_error());

echo "<table border='1' cellpadding='10'>";
echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th></th> <th></th></tr>";

while($row = mysql_fetch_array( $result )) {
  echo "<tr>";
  echo '<td>' . $row['id'] . '</td>';
  echo '<td>' . $row['firstname'] . '</td>';
  echo '<td>' . $row['lastname'] . '</td>';
  echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a></td>';
  echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
  echo "</tr>";
}

echo "</table>";

?>

<p><a href="new.php">Add a new record</a></p>
</body>
</html>
