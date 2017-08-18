<?php
include('connect-db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $result = mysql_query("DELETE FROM players WHERE id=$id") or die(mysql_error());
  header("Location: index.php");
} else {
  header("Location: index.php");
}
?>
