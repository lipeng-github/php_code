<?php
  $email = $_POST['email'];

  $dbc = mysqli_connect('localhost', 'lipeng', '123', 'elvis_store')
      or die('Error connecting to MySQL server.');
  $query = "DELETE FROM email_list WHERE email='$email'";
  mysqli_query($dbc, $query) or die('Error querying database.');

  echo 'Customer removed:'.$email;
  mysqli_close($dbc);
?>
