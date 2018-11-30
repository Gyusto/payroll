<?php session_start(); ?>
<?php 
//Receive the form inputs
$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);

//Check if all inputs have been sent
	if ($user == '' || $pass == '')
		{
	include('index.php');
	echo "<script>alert('You have to fill both fields')</script>";
	exit;
		}
		
		//Calling the connection page
	include('Includes/connection.php');
	
	//Table to be used
	$table_name = "users";
	
//Create and execute the query to check whether the user exist
 $query1 = "SELECT COUNT(userID) AS COUNT FROM $table_name WHERE Username = '$user' AND Password = SHA('$pass')";
 $result1 = mysql_query($query1);
 $row1 = mysql_fetch_array($result1);
 $count1 = $row1['COUNT'];
 
 if($count1 > 0)
 	{
// Execute the second query to retrieve the user information
 $query2 = "SELECT userID, Name, Title, Position, Username
 			FROM $table_name 
			WHERE Username = '$user' AND Password = SHA('$pass')";
 $result2 = mysql_query($query2);
 $row2 = mysql_fetch_array($result2);
 		$_SESSION['userID'] = $row2['userID'];
		$_SESSION['name'] = $row2['Name'];
		$_SESSION['title'] = $row2['Title'];
		$_SESSION['position'] = $row2['Position'];
		$_SESSION['user'] = $row2['Username'];

	// The code to call the home page of the operation	
	 include('home1.php');	
	}
else
 { 
  include('index.php');
  echo "<script>alert('Wrong Password or Username!, try again')</script>";
 exit;
 }


?>