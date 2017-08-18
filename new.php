<?php
function renderForm($first, $last, $error) {
?>

<!DOCTYPE HTML5>

<html>
  <head>
    <title>New Record</title>
  </head>

<body>
<?php
if ($error != '') {
  echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
  <div>
    <strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $first; ?>" /><br/>
    <strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $last; ?>" /><br/>
    <p>* required</p>
    <input type="submit" name="submit" value="Submit">
  </div>
</form>
</body>
</html>

<?php
}
include('db-connect.php');
if (isset($_POST['submit'])) {
  $firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
  $lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));

  if ($firstname == '' || $lastname == '') {
    $error = 'ERROR: Please fill in all required fields!';
    renderForm($firstname, $lastname, $error);
  } else {
    mysql_query("INSERT players SET firstname='$firstname', lastname='$lastname'") or die(mysql_error());
    header("Location: index.php");
  }
} else {
  renderForm('','','');
}

?>
