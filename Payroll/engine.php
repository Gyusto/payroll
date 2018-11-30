<?php session_start(); ?>
<?php 

	//Calling the connection page
	include('Includes/connection.php');

	//Receive the engine identification
	$eng = $_GET['eng'];
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//The begining of functions definitions																				//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
// Function of Employee recording engine
function employee_rec_eng()
	{
	//Table to be used
	$table_name1 = "employees";
		
	//Receive form inputs
	$name = mysql_real_escape_string($_POST['name']);
	$title = $_POST['title'];
	$mobile = mysql_real_escape_string($_POST['mobile']);
	$email = mysql_real_escape_string($_POST['email']);
	$position = $_POST['position'];
	$bank_name = $_POST['bank_name'];
	$acount = mysql_real_escape_string($_POST['acount']);
	$basic = $_POST['basic'];
	
if($position == 'Manager')
	{$pos = "Man";}
else if($position == 'Supervisor')
	{$pos = "Sup";}
else if($position == 'Acountant')
	{$pos = "Aco";}
else
	{$pos = "Sec";}

//Check whether the record already present in the database
$query1 = "SELECT COUNT(ID) AS COUNT FROM $table_name1 WHERE Full_Name = '$name'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This Employee is already present in the System')</script>";
		}
	else
		{
	//Create and execute the query to retrieve the last ID from employee table
	$query2 = "SELECT MAX(ID) AS Max_ID FROM $table_name1";
	$result2 = mysql_query($query2);
		if(!$result2)
			{
		//Generate Employee ID
		$employee_ID = "HSE/" . $pos . "/001";	
			}
		else
			{
	$row2 = mysql_fetch_array($result2);
		$max_ID = $row2['Max_ID'];
		//Increment the Maximun ID
		$new_ID = $max_ID + 1;
			if($new_ID > 99)
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/" . $new_ID;		
				}
			else if($new_ID > 9)
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/0" . $new_ID;		
				}
			else
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/00" . $new_ID;		
				}
			}
		
		if($bank_name == '' || $acount == '')
			{
		//Create and execute the query to insert employee info
		$query2 = "INSERT INTO $table_name1(employee_ID, Full_Name, Title, Position, Mobile, Email, Basic_Salary)
					VALUES('$employee_ID', '$name', '$title', '$position', '$mobile', '$email', '$basic')";
				
			}
		else
			{
		//Create and execute the query to insert employee info
		$query2 = "INSERT INTO $table_name1
						(employee_ID, Full_Name, Title, Position, Mobile, Email, Bank_Name, Bank_Acount, Basic_Salary)
					VALUES
						('$employee_ID', '$name', '$title', '$position', '$mobile', '$email', '$bank_name', '$acount', '$basic')";	
			}
		$result2 = mysql_query($query2);

	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct info.')</script>";
			}
		else
			{	
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employee editing engine
function employee_edit_eng()
	{
	//Receive employee ID
	$emp_ID = $_GET['eid'];
	
	//Table to be used
	$table_name1 = "employees";
		
	//Receive form inputs
	$name = mysql_real_escape_string($_POST['name']);
	$title = $_POST['title'];
	$mobile = mysql_real_escape_string($_POST['mobile']);
	$email = mysql_real_escape_string($_POST['email']);
	$position = $_POST['position'];
	$bank_name = $_POST['bank_name'];
	$acount = mysql_real_escape_string($_POST['acount']);
	$basic = $_POST['basic'];
	
if($position == 'Manager')
	{$pos = "Man";}
else if($position == 'Supervisor')
	{$pos = "Sup";}
else if($position == 'Acountant')
	{$pos = "Aco";}
else
	{$pos = "Sec";}

//Check whether the record already present in the database
$query1 = "SELECT COUNT(ID) AS COUNT FROM $table_name1 
			WHERE Full_Name = '$name' AND ID NOT IN('$emp_ID')";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('The name already used in the System')</script>";
		}
	else
		{
	
		$new_ID = $emp_ID;
			if($new_ID > 99)
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/" . $new_ID;		
				}
			else if($new_ID > 9)
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/0" . $new_ID;		
				}
			else
				{
			//Generate Employee ID
			$employee_ID = "HSE/" . $pos . "/00" . $new_ID;		
				}

		
		if($bank_name == '' || $acount == '')
			{
		//Create and execute the query to update employee info
		$query2 = "UPDATE $table_name1 
					SET employee_ID = '$employee_ID', Full_Name = '$name', Title = '$title', Position = '$position', 
						Mobile = '$mobile', Email = '$email', Basic_Salary = '$basic'
					WHERE ID = '$emp_ID'";
				
			}
		else
			{
		//Create and execute the query to update employee info
		$query2 = "UPDATE $table_name1 
					SET employee_ID = '$employee_ID', Full_Name = '$name', Title = '$title', Position = '$position', 
						Mobile = '$mobile', Email = '$email', Bank_Name = '$bank_name', Bank_Acount = '$acount', 
						Basic_Salary = '$basic'
					WHERE ID = '$emp_ID'";	
			}
		$result2 = mysql_query($query2);

	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct info.')</script>";
			}
		else
			{	
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			echo "<script>alert('Changes saved.')</script>";
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employee deleting engine
function employee_delete_eng()
	{
	//Receive employee ID
	$emp_ID = $_GET['eid'];
	//Receive Operation ID
	$ID = $_GET['id'];
	
	//Table to be used
	$table_name1 = "employees";

//Check whether the record still present in the database
$query1 = "SELECT COUNT(ID) AS COUNT FROM $table_name1 
			WHERE ID = '$emp_ID'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
	//Create and execute the query to delete employee info
	 $query2 = "DELETE FROM $table_name1
	 			WHERE ID = '$emp_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			include('default1.php');
			echo "<script>alert('Operation failed; Try again, or Contact System Administrator')</script>";
			}
		else
			{
			include('default1.php');
			}	
		}
	else
		{
		include('default1.php');
		echo "<script>alert('The employee already deleted')</script>";	
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Allowance recording engine
function allow_rec_eng()
	{
	//Table to be used
	$table_name1 = "allowances";
		
	//Receive form inputs
	$allowance = mysql_real_escape_string($_POST['allowance']);
	$percent = mysql_real_escape_string($_POST['percent']);

//Check whether the record already present in the database
$query1 = "SELECT COUNT(allowance_ID) AS COUNT FROM $table_name1 WHERE Allowance = '$allowance'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This allowance already present in the System')</script>";
		}
	else
		{
	//Create and execute the query to insert allowance info
	 $query2 = "INSERT INTO $table_name1(Allowance, Allowance_Percent) VALUES('$allowance', '$percent')";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Allowance editing engine
function allow_edit_eng()
	{
	//Receive allowance ID
	$allowance_ID = $_GET['aid'];
	
	//Table to be used
	$table_name1 = "allowances";
		
	//Receive form inputs
	$allowance = mysql_real_escape_string($_POST['allowance']);
	$percent = mysql_real_escape_string($_POST['percent']);

//Check whether the record already present in the database
$query1 = "SELECT COUNT(allowance_ID) AS COUNT FROM $table_name1 
			WHERE Allowance = '$allowance' AND allowance_ID NOT IN('$allowance_ID')";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This allowance already present in the System')</script>";
		}
	else
		{
	//Create and execute the query to update allowance info
	 $query2 = "UPDATE $table_name1 SET Allowance = '$allowance', Allowance_Percent = '$percent'
	 			WHERE allowance_ID = '$allowance_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Allowance deleting engine
function allow_delete_eng()
	{
	//Receive allowance ID
	$allowance_ID = $_GET['aid'];
	//Receive Operation ID
	$ID = $_GET['id'];
	
	//Table to be used
	$table_name1 = "allowances";

//Check whether the record still present in the database
$query1 = "SELECT COUNT(allowance_ID) AS COUNT FROM $table_name1 
			WHERE allowance_ID = '$allowance_ID'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
	//Create and execute the query to delete allowance info
	 $query2 = "DELETE FROM $table_name1
	 			WHERE allowance_ID = '$allowance_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			include('default1.php');
			echo "<script>alert('Operation failed; Try again, or Contact System Administrator')</script>";
			}
		else
			{
			include('default1.php');
			}	
		}
	else
		{
		include('default1.php');
		echo "<script>alert('This allowance already deleted')</script>";	
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employees' Allowances Assignment engine
function emp_allow_assign_eng()
	{
	//Receive employee ID
	$emp_ID = $_GET['eid'];
		
	//Table to be used
	$table_name1 = "allowances_employees";
		
	//Receive form inputs
	$allowance = $_POST['allowance'];

	//The query to check whether this record already inserted in the table
	$query1 = "SELECT COUNT(allow_emp_ID) AS COUNT FROM $table_name1
				WHERE ID = '$emp_ID' AND allowance_ID = '$allowance'";
	$result1 = mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
		$count = $row1['COUNT'];
		
	if($count > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This record already saved')</script>";			
		}
	else
		{
	//Create and execute the query to assign allowance to employee
	 $query2 = "INSERT INTO $table_name1(ID, allowance_ID) VALUES('$emp_ID', '$allowance')";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			echo "<script>alert('Assignment complete')</script>";
			}
		}
 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employees' Allowances Delete engine
function emp_allow_delete_eng()
	{
	//Receive employee ID
	$allow_emp_ID = $_GET['aid'];
	//Receive Operation ID
	$ID = $_GET['id'];
				
	//Table to be used
	$table_name1 = "allowances_employees";

	//Create and execute the query to delete employee's allowance assignment
	 $query2 = "DELETE FROM $table_name1 WHERE allow_emp_ID = '$allow_emp_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			include('default1.php');
			echo "<script>alert('Assignment deleted')</script>";
			}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Deduction recording engine
function ded_rec_eng()
	{
	//Table to be used
	$table_name1 = "deductions";
		
	//Receive form inputs
	$deduction = mysql_real_escape_string($_POST['deduction']);

//Check whether the record already present in the database
$query1 = "SELECT COUNT(deduction_ID) AS COUNT FROM $table_name1 WHERE Deduction = '$deduction'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This deduction already present in the System')</script>";
		}
	else
		{
	//Create and execute the query to insert deduction info
	 $query2 = "INSERT INTO $table_name1(Deduction) VALUES('$deduction')";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Deduction editing engine
function ded_edit_eng()
	{
	//Receive deduction ID
	$deduction_ID = $_GET['did'];
	
	//Table to be used
	$table_name1 = "deductions";
		
	//Receive form inputs
	$deduction = mysql_real_escape_string($_POST['deduction']);

//Check whether the record already present in the database
$query1 = "SELECT COUNT(deduction_ID) AS COUNT FROM $table_name1 
			WHERE Deduction = '$deduction' AND deduction_ID NOT IN('$deduction_ID')";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This Deduction already present in the System')</script>";
		}
	else
		{
	//Create and execute the query to update deduction info
	 $query2 = "UPDATE $table_name1 SET Deduction = '$deduction'
	 			WHERE deduction_ID = '$deduction_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			}
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Deduction deleting engine
function ded_delete_eng()
	{
	//Receive deduction ID
	$deduction_ID = $_GET['did'];
	//Receive Operation ID
	$ID = $_GET['id'];
	
	//Table to be used
	$table_name1 = "deductions";

//Check whether the record still present in the database
$query1 = "SELECT COUNT(deduction_ID) AS COUNT FROM $table_name1 
			WHERE deduction_ID = '$deduction_ID'";
$result1 = mysql_query($query1);
$row1 = mysql_fetch_array($result1);
$count1 = $row1['COUNT'];

	if($count1 > 0)
		{
	//Create and execute the query to delete deduction info
	 $query2 = "DELETE FROM $table_name1
	 			WHERE deduction_ID = '$deduction_ID'";
	 $result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			include('default1.php');
			echo "<script>alert('Operation failed; Try again, or Contact System Administrator')</script>";
			}
		else
			{
			include('default1.php');
			}	
		}
	else
		{
		include('default1.php');
		echo "<script>alert('This deduction already deleted')</script>";	
		}

 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employees' Deduction Assignment engine
function emp_ded_assign_eng()
	{
	//Receive employee ID
	$emp_ID = $_GET['eid'];
		
	//Table to be used
	$table_name1 = "deductions_employees";
		
	//Receive form inputs
	$deduction = $_POST['deduction'];
	$percent = mysql_real_escape_string($_POST['percent']);
	$desc = mysql_real_escape_string($_POST['desc']);
	

	//The query to check whether this record already inserted in the table
	$query1 = "SELECT COUNT(ded_emp_ID) AS COUNT FROM $table_name1
				WHERE ID = '$emp_ID' AND deduction_ID = '$deduction'";
	$result1 = mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
		$count = $row1['COUNT'];
		
	if($count > 0)
		{
		//Receive Operation ID
		$ID = $_GET['id'];
		include('default1.php');
		echo "<script>alert('This record already saved')</script>";			
		}
	else
		{
		if($desc == '')
			{
		//Create and execute the query to assign deduction to employee
	 	$query2 = "INSERT INTO $table_name1(ID, deduction_ID, Deduction_Percent) 
					VALUES('$emp_ID', '$deduction', '$percent')";		
			}
		else
			{
		//Create and execute the query to assign deduction to employee
	 	$query2 = "INSERT INTO $table_name1(ID, deduction_ID, Deduction_Percent, Description) 
					VALUES('$emp_ID', '$deduction', '$percent', '$desc')";		
			}
			
	 	$result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			//Receive Operation ID
			$ID = $_GET['class'];
			include('default1.php');
			echo "<script>alert('Operation failed; Try again with the correct data')</script>";
			}
		else
			{
			//Receive Operation ID
			$ID = $_GET['id'];
			include('default1.php');
			echo "<script>alert('Assignment complete')</script>";
			}
		}
 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function of Employees' Pay Salaries recording engine
function emp_pay_salary_eng()
	{
	//Receive Operation ID
	$ID = $_GET['id'];
	//Receive form inputs
	$month = $_POST['month'];
	$year = $_POST['year'];
	$pay_check = $_POST['pay_check'];
	
		
	//Table to be used
	$table_name1 = "salary_payment_dates";
	$table_name2 = "salary_payments";
	$table_name3 = "employees";
	$table_name4 = "allowances_employees";
	$table_name5 = "allowances_payments";
	$table_name6 = "deductions_employees";
	$table_name7 = "deductions_payments";

	//The query to check whether this record was already inserted in the table
	$query1 = "SELECT COUNT(sal_pay_date_ID) AS COUNT FROM $table_name1
				WHERE Month = '$month' AND Year = '$year'";
	$result1 = mysql_query($query1);
	$row1 = mysql_fetch_array($result1);
		$count = $row1['COUNT'];
		
	if($count > 0)
		{
		include('default1.php');
		echo "<script>alert('This month has already been recorded')</script>";			
		}
	else
		{
		//Create and execute the query to assign deduction to employee
	 	$query2 = "INSERT INTO $table_name1(Month, Year, Payment_Date, userID) 
					VALUES('$month', '$year', DATE(NOW()), '" . $_SESSION['userID'] . "')";		
	 	$result2 = mysql_query($query2);
	 
	 	//Check for the result
		if(!$result2)
			{
			include('default1.php');
			echo "<script>alert('Operation failed; Try again')</script>";
			}
		else
			{
			// Retrieve payment date ID
			$query3 = "SELECT sal_pay_date_ID FROM $table_name1
						WHERE Month = '$month' AND Year = '$year'";
			$result3 = mysql_query($query3);
			$row3 = mysql_fetch_array($result3);
				$pay_date_ID = $row3['sal_pay_date_ID'];
				
			// Loop around array inputs
			for($x = 0; $x < sizeof($pay_check); $x++)
			{
				// Query to insert salary payment data
				$query4 = "INSERT INTO $table_name2(ID, sal_pay_date_ID) ";
				$query4 .= "VALUES('" . $pay_check[$x] ."', '" . $pay_date_ID ."')";
				$result4 = mysql_query($query4);
				
				if(!$result4)
				{
					//include('default1.php');
					//
				}
				else
				{
					// Retrieve the ID of Salary payment
					$query5 = "SELECT sal_pay_ID FROM $table_name2
								WHERE ID = '$pay_check[$x]' AND sal_pay_date_ID = '$pay_date_ID'";
					$result5 = mysql_query($query5);
					$row5 = mysql_fetch_array($result5);
						$sal_pay_ID = $row5['sal_pay_ID'];
						
					// Retrieve Allowances IDs for this Employee
					$query6 = "SELECT allowance_ID FROM $table_name4 WHERE ID IN('$pay_check[$x]')";
					$result6 = mysql_query($query6);
					
					// Insert data into Allowances Payments table
					while($row6 = mysql_fetch_array($result6))
					{
						$query7 = "INSERT INTO $table_name5(sal_pay_ID, allowance_ID) ";
						$query7 .= "VALUES('$sal_pay_ID', '$row6[0]')";
						$result7 = mysql_query($query7);	
					}
					
					// Retrieve Deductions IDs for this Employee
					$query8 = "SELECT deduction_ID FROM $table_name6 WHERE ID IN('$pay_check[$x]')";
					$result8 = mysql_query($query8);
					
					// Insert data into Deduction Payments table
					while($row8 = mysql_fetch_array($result8))
					{
						$query9 = "INSERT INTO $table_name7(sal_pay_ID, deduction_ID) ";
						$query9 .= "VALUES('$sal_pay_ID', '$row8[0]')";
						$result9 = mysql_query($query9);	
					}
									
				}

			} // End of For loop
			include('default1.php');
			echo "<script>alert('Payments recorded successfully')</script>";	
			}
		}
 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Send salary slip to employee email
function send_email_eng()
	{
	//Receive Operation ID
	$ID = $_GET['id'];
	// Receive employee ID
		$emp_ID = $_GET['eid'];
		$spd_ID = $_GET['spd_ID'];	// Receive Salary pay date ID
			
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year, Payment_Date FROM $table_name7 ";
	$query .= "WHERE sal_pay_date_ID = '$spd_ID'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$sal_pay_date_ID = $row['sal_pay_date_ID'];
	$month = $row['Month'];
	$year = $row['Year'];
	$pay_date = $row['Payment_Date'];
	if($month == "01"){$month_words = "January"; }
	else if($month == "02")	{$month_words = "February"; }
	else if($month == "03")	{$month_words = "March"; }
	else if($month == "04")	{$month_words = "April"; }
	else if($month == "05")	{$month_words = "May"; }
	else if($month == "06")	{$month_words = "June"; }
	else if($month == "07")	{$month_words = "July"; }
	else if($month == "08")	{$month_words = "August"; }
	else if($month == "09")	{$month_words = "September"; }
	else if($month == "10")	{$month_words = "October"; }
	else if($month == "11")	{$month_words = "November"; }
	else 	{$month_words = "December"; }

// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Position, Email, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID = '$emp_ID'";
 $result1 = mysql_query($query1);
 $row1 = mysql_fetch_array($result1);
 	$employee_ID = $row1['employee_ID'];
	$employee_Full_Name = $row1['Full_Name'];
	$employee_Position = $row1['Position'];
	$employee_Basic_Salary = $row1['Basic_Salary'];
	
	$to = $row1['Email'];	// Email of the Employee
	$subject = "Salary Slip of $month_words, $year";
	
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);

 $message = "<table style='width:250px;font-family:Cambria;font-size:13px;' border = '0' cellpadding = '1' cellspacing = '1'>";
 $message .= "<tr><th colspan = '2' align = 'left'>HALE SISAL ESTATE</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Pay slip for $month_words $year</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>$employee_Full_Name</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Employee No. $employee_ID</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Position: $employee_Position</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'><hr /></th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>&nbsp;</th></tr>";
 
 $message .= "<tr><td align = 'left'>Basic Salary</td><td align = 'right'>$employee_Basic_Salary</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'><u>ALLOWANCES</ul></td></tr>";
 // Display the Allowances available and whether the employee is given that allowance
	$total_gross = 0;
	$total_gross = $total_gross + $employee_Basic_Salary;
	$total_allowances = 0;
	while($row2 = mysql_fetch_array($result2))
		{
 	$message .= "<tr><td>" . $row2['Allowance'] . "</td>";
 		// Check whether the employee has paid this allowance
		$query4 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
		$query4 .= "WHERE allowance_ID = '" . $row2['allowance_ID'] . "' ";
		$query4 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $emp_ID ."' ";
		$query4 .= "AND sal_pay_date_ID = '$spd_ID')";
		$result4 = mysql_query($query4);
		$row4 = mysql_fetch_array($result4);
		 	$count4 = $row4['COUNT'];
			
			if($count4 > 0)
			{
			// Calculate the Allowance amount
			$allowance_amount = $employee_Basic_Salary * $row2['Allowance_Percent'] / 100;
				
	$message .= "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
			$total_gross += $allowance_amount;
			$total_allowances += $allowance_amount;	
			}
			else
			{
	$message .= "<td align = 'right'>0.00</td>";			
			}
	$message .= "</tr>";
		}
 $message .= "<tr><td>Total Allowances</td><td align = 'right'>" . number_format($total_allowances, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td>GROSS PAY</td><td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'><u>DEDUCTIONS</ul></td></tr>";
 // Display the Deductions available and whether the employee is given that deduction
	$total_net = $total_gross; $taxable_amount = $total_gross;
	$mfuko = ""; $mfuko_amount = 0;
	while($row3 = mysql_fetch_array($result3))
		{
 	$message .= "<tr><td>" . $row3['Deduction'] . "</td>";
 		// Check whether the employee has paid this deduction
		$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
		$query5 .= "WHERE deduction_ID = '" . $row3['deduction_ID'] . "' ";
		$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $emp_ID ."' ";
		$query5 .= "AND sal_pay_date_ID = '$spd_ID')";
		$result5 = mysql_query($query5);
		$row5 = mysql_fetch_array($result5);
		 	$count5 = $row5['COUNT'];
			
			if($count5 > 0)
			{
			// Retrieve the percent of the deduction to the employee
			$query6 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query6 .= "WHERE deduction_ID = '" . $row3['deduction_ID'] . "'";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
			 	$deduction_percent = $row6['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($row3['Deduction'] == "NSSF")
						{
							$taxable_amount -= $deduction_amount; 
							$mfuko = "NSSF";
							$mfuko_amount = $deduction_amount;	
						}
					if($row3['Deduction'] == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
							$mfuko = "LAPF";
							$mfuko_amount = $deduction_amount;
						}
				
				$message .= "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				$message .= "<td align = 'right'>0.00</td>";		
					}
	$message .= "</tr>";
		}
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td>LESS 10% $mfuko</td><td align = 'right'>" . number_format($mfuko_amount, 2, '.', ',') . "</td></tr>";
 // Start of TAX calculation	//////////////////////////////////////////////	
			if($taxable_amount > 0 && $taxable_amount <= 170000)
				{
			$tax_amount = 0;		
				}
			else if($taxable_amount > 170000 && $taxable_amount <= 360000)
				{
			$tax_amount = ($taxable_amount - 170000) * 9 / 100;	
				}
			else if($taxable_amount > 360000 && $taxable_amount <= 540000)
				{
			$tax_amount = 17100 + (($taxable_amount - 360000) * 20 / 100);	
				}
			else if($taxable_amount > 540000 && $taxable_amount <= 720000)
				{
			$tax_amount = 53100 + (($taxable_amount - 540000) * 25 / 100);	
				}
			else
				{
			$tax_amount = 98100 + (($taxable_amount - 720000) * 30 / 100);		
				}
 // End of TAX calculation	//////////////////////////////////////////////
 	// Deduct TAX from Gross
	$total_net -= $tax_amount;
 $message .= "<tr><td>TAXABLE TOTAL</td><td align = 'right'>" . number_format($taxable_amount, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>P.A.Y.E</td></tr>";
 $message .= "<tr><td>TAX PAYABLE</td><td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td>NET PAY</td><td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'><hr /></td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'>_______________<br />Signature</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "</table>";
 
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

 // More headers
 $headers .= 'From: <nassorojuma32@gmail.com>' . "\r\n";
 
 // Send Email
 mail($to,$subject,$message,$headers);

include('default1.php');
echo "<script>alert('Email sent')</script>";
 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Send salary slip to employee email
function send_emails_list_eng()
	{
	//Receive Operation ID
	$ID = $_GET['id'];
	$spd_ID = $_GET['spd_ID'];	// Receive Salary pay date ID
			
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year, Payment_Date FROM $table_name7 ";
	$query .= "WHERE sal_pay_date_ID = '$spd_ID'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$sal_pay_date_ID = $row['sal_pay_date_ID'];
	$month = $row['Month'];
	$year = $row['Year'];
	$pay_date = $row['Payment_Date'];
	if($month == "01"){$month_words = "January"; }
	else if($month == "02")	{$month_words = "February"; }
	else if($month == "03")	{$month_words = "March"; }
	else if($month == "04")	{$month_words = "April"; }
	else if($month == "05")	{$month_words = "May"; }
	else if($month == "06")	{$month_words = "June"; }
	else if($month == "07")	{$month_words = "July"; }
	else if($month == "08")	{$month_words = "August"; }
	else if($month == "09")	{$month_words = "September"; }
	else if($month == "10")	{$month_words = "October"; }
	else if($month == "11")	{$month_words = "November"; }
	else 	{$month_words = "December"; }

// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Position, Email, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID IN(SELECT ID FROM $table_name6 WHERE sal_pay_date_ID = '$spd_ID')";
 $result1 = mysql_query($query1);
 
 
 while($row1 = mysql_fetch_array($result1))
 {
 
 
 
 
 	$employee_ID = $row1['employee_ID'];
	$employee_Full_Name = $row1['Full_Name'];
	$employee_Position = $row1['Position'];
	$employee_Basic_Salary = $row1['Basic_Salary'];
	
	$to = $row1['Email'];	// Email of the Employee
	$subject = "Salary Slip of $month_words, $year";
	
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);

 $message = "<table style='width:250px;font-family:Cambria;font-size:13px;' border = '0' cellpadding = '1' cellspacing = '1'>";
 $message .= "<tr><th colspan = '2' align = 'left'>HALE SISAL ESTATE</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Pay slip for $month_words $year</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>$employee_Full_Name</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Employee No. $employee_ID</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>Position: $employee_Position</th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'><hr /></th></tr>";
 $message .= "<tr><th colspan = '2' align = 'left'>&nbsp;</th></tr>";
 
 $message .= "<tr><td align = 'left'>Basic Salary</td><td align = 'right'>$employee_Basic_Salary</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'><u>ALLOWANCES</ul></td></tr>";
 // Display the Allowances available and whether the employee is given that allowance
	$total_gross = 0;
	$total_gross = $total_gross + $employee_Basic_Salary;
	$total_allowances = 0;
	while($row2 = mysql_fetch_array($result2))
		{
 	$message .= "<tr><td>" . $row2['Allowance'] . "</td>";
 		// Check whether the employee has paid this allowance
		$query4 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
		$query4 .= "WHERE allowance_ID = '" . $row2['allowance_ID'] . "' ";
		$query4 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
		$query4 .= "AND sal_pay_date_ID = '$spd_ID')";
		$result4 = mysql_query($query4);
		$row4 = mysql_fetch_array($result4);
		 	$count4 = $row4['COUNT'];
			
			if($count4 > 0)
			{
			// Calculate the Allowance amount
			$allowance_amount = $employee_Basic_Salary * $row2['Allowance_Percent'] / 100;
				
	$message .= "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
			$total_gross += $allowance_amount;
			$total_allowances += $allowance_amount;	
			}
			else
			{
	$message .= "<td align = 'right'>0.00</td>";			
			}
	$message .= "</tr>";
		}
 $message .= "<tr><td>Total Allowances</td><td align = 'right'>" . number_format($total_allowances, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td>GROSS PAY</td><td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'><u>DEDUCTIONS</ul></td></tr>";
 // Display the Deductions available and whether the employee is given that deduction
	$total_net = $total_gross; $taxable_amount = $total_gross;
	$mfuko = ""; $mfuko_amount = 0;
	while($row3 = mysql_fetch_array($result3))
		{
 	$message .= "<tr><td>" . $row3['Deduction'] . "</td>";
 		// Check whether the employee has paid this deduction
		$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
		$query5 .= "WHERE deduction_ID = '" . $row3['deduction_ID'] . "' ";
		$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
		$query5 .= "AND sal_pay_date_ID = '$spd_ID')";
		$result5 = mysql_query($query5);
		$row5 = mysql_fetch_array($result5);
		 	$count5 = $row5['COUNT'];
			
			if($count5 > 0)
			{
			// Retrieve the percent of the deduction to the employee
			$query6 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query6 .= "WHERE deduction_ID = '" . $row3['deduction_ID'] . "'";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
			 	$deduction_percent = $row6['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($row3['Deduction'] == "NSSF")
						{
							$taxable_amount -= $deduction_amount; 
							$mfuko = "NSSF";
							$mfuko_amount = $deduction_amount;	
						}
					if($row3['Deduction'] == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
							$mfuko = "LAPF";
							$mfuko_amount = $deduction_amount;
						}
				
				$message .= "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				$message .= "<td align = 'right'>0.00</td>";		
					}
	$message .= "</tr>";
		}
 $message .= "<tr><td colspan = '2'>&nbsp;</td></tr>";
 $message .= "<tr><td>LESS 10% $mfuko</td><td align = 'right'>" . number_format($mfuko_amount, 2, '.', ',') . "</td></tr>";
 // Start of TAX calculation	//////////////////////////////////////////////	
			if($taxable_amount > 0 && $taxable_amount <= 170000)
				{
			$tax_amount = 0;		
				}
			else if($taxable_amount > 170000 && $taxable_amount <= 360000)
				{
			$tax_amount = ($taxable_amount - 170000) * 9 / 100;	
				}
			else if($taxable_amount > 360000 && $taxable_amount <= 540000)
				{
			$tax_amount = 17100 + (($taxable_amount - 360000) * 20 / 100);	
				}
			else if($taxable_amount > 540000 && $taxable_amount <= 720000)
				{
			$tax_amount = 53100 + (($taxable_amount - 540000) * 25 / 100);	
				}
			else
				{
			$tax_amount = 98100 + (($taxable_amount - 720000) * 30 / 100);		
				}
 // End of TAX calculation	//////////////////////////////////////////////
 	// Deduct TAX from Gross
	$total_net -= $tax_amount;
 $message .= "<tr><td>TAXABLE TOTAL</td><td align = 'right'>" . number_format($taxable_amount, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2'>P.A.Y.E</td></tr>";
 $message .= "<tr><td>TAX PAYABLE</td><td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td>NET PAY</td><td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'><hr /></td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'left'>_______________<br />Signature</td></tr>";
 $message .= "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 $message .= "</table>";
 
 $headers = "MIME-Version: 1.0" . "\r\n";
 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

 // More headers
 $headers .= 'From: <nassorojuma32@gmail.com>' . "\r\n";
 
 // Send Email
 mail($to,$subject,$message,$headers);
 
 
 }
 
 

include('default1.php');
echo "<script>alert('Emails sent')</script>";
 	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//The end of functions definitions																					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Calling the Function
	echo $eng();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


?>