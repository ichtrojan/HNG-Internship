<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';

   $conn = mysql_connect($dbhost, $dbuser, $dbpass);

   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }

   $sql = 'SELECT id, name, age FROM human';
   mysql_select_db('hng');
   $retval = mysql_query( $sql, $conn );

   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }

   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
      echo "ID :{$row['id']}  <br> ".
         "NAME : {$row['name']} <br> ".
         "AGE : {$row['age']} <br> ";
   }

   echo "Fetched data successfully\n";

   mysql_close($conn);
?>
