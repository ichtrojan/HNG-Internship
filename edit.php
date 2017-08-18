<?php
function renderForm($id, $firstname, $lastname, $error) {
?>

<!DOCTYPE HTML>

<html>
  <head>
    <title>Edit Record</title>
  </head>
<body>

<?php
if ($error != '') {
  echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>



<form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div>
      <p><strong>ID:</strong> <?php echo $id; ?></p>
          <strong>First Name: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/>
          <strong>Last Name: *</strong> <input type="text" name="lastname" value="<?php echo $lastname; ?>"/><br/>
          <p>* Required</p>
          <input type="submit" name="submit" value="Submit">
    </div>
  </form>
</body>
</html>

<?php

}

// connect to the database

include('db-connect.php');

if (isset($_POST['submit'])) {
  if (is_numeric($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
    $lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));

    if ($firstname == '' || $lastname == '') {
      $error = 'ERROR: Please fill in all required fields!';
      renderForm($id, $firstname, $lastname, $error);
    } else {
      mysql_query("UPDATE players SET firstname='$firstname', lastname='$lastname' WHERE id='$id'") or die(mysql_error());
      header("Location: index.php");
    }
  } else {
    echo 'Error!';
  }
} else {
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
    $result = mysql_query("SELECT * FROM players WHERE id=$id") or die(mysql_error());
    $row = mysql_fetch_array($result);

    if($row) {
      $firstname = $row['firstname'];
      $lastname = $row['lastname'];
      renderForm($id, $firstname, $lastname, '');
    } else {
      echo "No results!";
    }
  } else {
    echo 'Error!';
  }
}

?>
