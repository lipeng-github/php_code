<?php
    $dbc = mysqli_connect('localhost', 'lipeng', '123', 'elvis_store')
	or die('Erroe connecting to MySQL server');
    
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
	$email = $_POST['email'];

	$query = "insert into email_list (first_name, last_name, email) values('$first_name', '$last_name', '$email')";
	mysqli_query($dbc, $query) or die('Error querying database');

	echo 'Customer added.';

	mysqli_close($dbc);
?>
