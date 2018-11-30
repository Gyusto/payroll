
<?php 

		//Calling the connection page
	include('Includes/connection.php');

// Function Employees' Salary Slip 
	function emp_salary_slip()
		{
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
 $query1 = "SELECT ID, employee_ID, Full_Name, Position, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID = '$emp_ID'";
 $result1 = mysql_query($query1);
 $row1 = mysql_fetch_array($result1);
 	$employee_ID = $row1['employee_ID'];
	$employee_Full_Name = $row1['Full_Name'];
	$employee_Position = $row1['Position'];
	$employee_Basic_Salary = $row1['Basic_Salary'];
	
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
		
echo "<center>";
 echo "<table class = 'data3' width = '250px' border = '0' cellpadding = '1' cellspacing = '1'>";
 echo "<tr><th colspan = '2' align = 'left'>HALE SISAL ESTATE</th></tr>";
 echo "<tr><th colspan = '2' align = 'left'>Pay slip for $month_words $year</th></tr>";
 echo "<tr><th colspan = '2' align = 'left'>$employee_Full_Name</th></tr>";
 echo "<tr><th colspan = '2' align = 'left'>Employee No. $employee_ID</th></tr>";
 echo "<tr><th colspan = '2' align = 'left'>Position: $employee_Position</th></tr>";
 echo "<tr><th colspan = '2' align = 'left'><hr /></th></tr>";
 echo "<tr><th colspan = '2' align = 'left'>&nbsp;</th></tr>";
 
 echo "<tr><td align = 'left'>Basic Salary</td><td align = 'right'>$employee_Basic_Salary</td></tr>";
 echo "<tr><td colspan = '2'>&nbsp;</td></tr>";
 echo "<tr><td colspan = '2' align = 'left'><u>ALLOWANCES</ul></td></tr>";
 // Display the Allowances available and whether the employee is given that allowance
	$total_gross = 0;
	$total_gross = $total_gross + $employee_Basic_Salary;
	$total_allowances = 0;
	while($row2 = mysql_fetch_array($result2))
		{
 	echo "<tr><td>" . $row2['Allowance'] . "</td>";
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
				
	echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
			$total_gross += $allowance_amount;
			$total_allowances += $allowance_amount;	
			}
			else
			{
	echo "<td align = 'right'>0.00</td>";			
			}
	echo "</tr>";
		}
 echo "<tr><td>Total Allowances</td><td align = 'right'>" . number_format($total_allowances, 2, '.', ',') . "</td></tr>";
 echo "<tr><td colspan = '2'>&nbsp;</td></tr>";
 echo "<tr><td>GROSS PAY</td><td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td></tr>";
 echo "<tr><td colspan = '2'>&nbsp;</td></tr>";
 echo "<tr><td colspan = '2' align = 'left'><u>DEDUCTIONS</ul></td></tr>";
 // Display the Deductions available and whether the employee is given that deduction
	$total_net = $total_gross; $taxable_amount = $total_gross;
	$mfuko = ""; $mfuko_amount = 0;
	while($row3 = mysql_fetch_array($result3))
		{
 	echo "<tr><td>" . $row3['Deduction'] . "</td>";
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
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'>0.00</td>";		
					}
	echo "</tr>";
		}
 echo "<tr><td colspan = '2'>&nbsp;</td></tr>";
 echo "<tr><td>LESS 10% $mfuko</td><td align = 'right'>" . number_format($mfuko_amount, 2, '.', ',') . "</td></tr>";
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
 echo "<tr><td>TAXABLE TOTAL</td><td align = 'right'>" . number_format($taxable_amount, 2, '.', ',') . "</td></tr>";
 echo "<tr><td colspan = '2'>P.A.Y.E</td></tr>";
 echo "<tr><td>TAX PAYABLE</td><td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td></tr>";
 echo "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 echo "<tr><td>NET PAY</td><td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td></tr>";
 echo "<tr><td colspan = '2' align = 'center'><hr /></td></tr>";
 echo "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 echo "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 echo "<tr><td colspan = '2' align = 'left'>_______________<br />Signature</td></tr>";
 echo "<tr><td colspan = '2' align = 'center'>&nbsp;</td></tr>";
 echo "</table>";
 echo "</center>";

 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Calling the Function
	echo $ID();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_close($con); 

?>