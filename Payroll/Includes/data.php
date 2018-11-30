
<?php 

		//Calling the connection page
	include('Includes/connection.php');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//The begining of functions definitions																				//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Tables and lists display	////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees list display 
	function emp_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT employee_ID, Full_Name, Title, Position, Mobile, Email
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=employee_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Mobile</th><th>Email</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td align = 'center'>" . $row1['Mobile'] . "</td>";
				echo "<td>" . $row1['Email'] . "</td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees Edit-Delete list display 
	function emp_edit_delete_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Title, Position, Mobile, Email
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=employee_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Mobile</th><th>Email</th><th>Edit</th><th>Drop</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td align = 'center'>" . $row1['Mobile'] . "</td>";
				echo "<td>" . $row1['Email'] . "</td>";
				echo "<td align = 'center'><a href = 'default.php?id=employee_edit_frm&eid=$row1[0]' title='Edit this Employee'><img src = 'Images/edit.png' /></a></td>";
				echo "<td align = 'center'><a href = 'engine.php?eng=employee_delete_eng&id=emp_edit_delete_list_dsp&eid=$row1[0]' title='Delete this Employee'><img src = 'Images/drop.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Allowances list display 
	function allow_list_dsp()
		{
		//Table to be used
		$table_name1 = "allowances";
		
// Execute the query to retrieve the allowances' information
 $query1 = "SELECT allowance_ID, Allowance, Allowance_Percent
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Allowance";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Allowances Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Allowances</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Allowance</th><th>Allowance Percentage (%)</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td>" . $row1['Allowance'] . "</td>";
				echo "<td align = 'center'>" . $row1['Allowance_Percent'] . "</td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Allowances Edit-Delete list display 
	function allow_edit_delete_list_dsp()
		{
		//Table to be used
		$table_name1 = "allowances";
		
// Execute the query to retrieve the allowances' information
 $query1 = "SELECT allowance_ID, Allowance, Allowance_Percent
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Allowance";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Allowances Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Allowances</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Allowance</th><th>Allowance Percentage (%)</th><th>Delete</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td>" . $row1['Allowance'] . "</td>";
				echo "<td align = 'center'>" . $row1['Allowance_Percent'] . "</td>";
				echo "<td align = 'center'><a href = 'engine.php?eng=allow_delete_eng&id=allow_edit_delete_list_dsp&aid=$row1[0]' title='Delete this Allowance'><img src = 'Images/drop.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees Allowances allocation list display 
	function emp_allow_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_employees";
		
// Execute the query to retrieve employees - allowances allocation information
 $query1 = "SELECT employee_ID, Full_Name, Title, Position, Allowance, Allowance_Percent
 			FROM $table_name1 Em, $table_name2 Al, $table_name3 Ae
			WHERE Em.ID = Ae.ID AND Al.allowance_ID = Ae.allowance_ID
			ORDER BY Full_Name, Allowance";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Allowances Allocation</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Allowance</th><th>Allowance Percent (%)</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td>" . $row1['Allowance'] . "</td>";
				echo "<td>" . $row1['Allowance_Percent'] . "</td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees Allowances editing list display 
	function emp_allow_edit_delete_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_employees";
		
// Execute the query to retrieve employees - allowances allocation information
 $query1 = "SELECT allow_emp_ID, employee_ID, Full_Name, Title, Position, Allowance, Allowance_Percent
 			FROM $table_name1 Em, $table_name2 Al, $table_name3 Ae
			WHERE Em.ID = Ae.ID AND Al.allowance_ID = Ae.allowance_ID
			ORDER BY Full_Name, Allowance";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Allowances Allocation</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Allowance</th><th>Allowance Percent (%)</th><th>Drop</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td>" . $row1['Allowance'] . "</td>";
				echo "<td>" . $row1['Allowance_Percent'] . "</td>";
				echo "<td align = 'center'><a href = 'engine.php?eng=emp_allow_delete_eng&id=emp_allow_edit_delete_list_dsp&aid=$row1[0]' title='Delete this Assignment'><img src = 'Images/drop.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' allowances assigning list display 
	function emp_allow_assign_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Title, Position, Mobile, Email
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>Select the Employee below to Assign Allowances</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Mobile</th><th>Email</th><th>Select</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td align = 'center'>" . $row1['Mobile'] . "</td>";
				echo "<td>" . $row1['Email'] . "</td>";
				echo "<td align = 'center'><a href = 'default.php?id=emp_allow_assign_frm&eid=$row1[0]' title='Select this Employee'><img src = 'Images/pick.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Deductions list display 
	function ded_list_dsp()
		{
		//Table to be used
		$table_name1 = "deductions";
		
// Execute the query to retrieve the deductions' information
 $query1 = "SELECT deduction_ID, Deduction
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Deduction";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Deductions Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Deductions</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Deduction</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td>" . $row1['Deduction'] . "</td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Deductions edit-delete list display 
	function ded_edit_delete_list_dsp()
		{
		//Table to be used
		$table_name1 = "deductions";
		
// Execute the query to retrieve the deduction' information
 $query1 = "SELECT deduction_ID, Deduction
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Deduction";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Deductions Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Deductions</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Deduction</th><th>Edit</th><th>Drop</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td>" . $row1['Deduction'] . "</td>";
				echo "<td align = 'center'><a href = 'default.php?id=ded_edit_frm&did=$row1[0]' title='Edit this Deduction'><img src = 'Images/edit.png' /></a></td>";
				echo "<td align = 'center'><a href = 'engine.php?eng=ded_delete_eng&id=ded_edit_delete_list_dsp&did=$row1[0]' title='Delete this Deduction'><img src = 'Images/drop.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees Deductions allocation list display 
	function emp_ded_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		$table_name2 = "deductions";
		$table_name3 = "deductions_employees";
		
// Execute the query to retrieve employees - deductions allocation information
 $query1 = "SELECT employee_ID, Full_Name, Title, Deduction, Deduction_Percent, Description
 			FROM $table_name1 Em, $table_name2 D, $table_name3 De
			WHERE Em.ID = De.ID AND D.deduction_ID = De.deduction_ID
			ORDER BY Full_Name, Deduction";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = '#'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Deductions Allocation</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Deduction</th><th>Deduction Percent (%)</th><th>Description</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Deduction'] . "</td>";
				echo "<td>" . $row1['Deduction_Percent'] . "</td>";
				echo "<td>" . $row1['Description'] . "</td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' deduction assigning list display 
	function emp_ded_assign_list_dsp()
		{
		//Table to be used
		$table_name1 = "employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Title, Position, Mobile, Email
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = '#'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>Select the Employee below to Assign Deductions</b></font>";
echo "<br />";
 echo "<table class = 'data' width = '98%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th>No.</th><th>Employee ID</th><th>Name</th><th>Position</th><th>Mobile</th><th>Email</th><th>Select</th></tr>";
 //Create a loop arround the results.
  	$no = 1;
  	while($row1 = mysql_fetch_array($result1))
   		{
			echo "<tr>";
				echo "<td align = 'center'>" . $no . ".</td>";
				echo "<td align = 'center'>" . $row1['employee_ID'] . "</td>";
				echo "<td>" . $row1['Title'] . " " . $row1['Full_Name'] . "</td>";
				echo "<td>" . $row1['Position'] . "</td>";
				echo "<td align = 'center'>" . $row1['Mobile'] . "</td>";
				echo "<td>" . $row1['Email'] . "</td>";
				echo "<td align = 'center'><a href = 'default.php?id=emp_ded_assign_frm&eid=$row1[0]' title='Select this Employee'><img src = 'Images/pick.png' /></a></td>";
			echo "</tr>";
			$no++;
		}
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// End of Tables and lists display	////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Forms display	////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employee form display 
	function employee_add_frm()
		{
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=employee_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<br /><br />";
 echo "<form action = 'engine.php?eng=employee_rec_eng&id=emp_list_dsp&class=employee_add_frm' method = 'post'>";
 echo "<table class = 'data' width = '90%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";

	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Employee Recording Form</legend>";
		echo "<br />";
		echo "<table width = '100%' border = '0' cellpadding = '0' cellspacing = '0'>";
			echo "<tr>";
				echo "<td align = 'right' valign = 'top'>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Full Name &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'name' size = '18' required = 'required' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Title &nbsp;";
						echo "<select class = 'fields-frm' name = 'title' required = 'required'>";
							echo "<option value = ''>Select the Employee Title</option>";
							echo "<option>Mr.</option>";
							echo "<option>Mrs.</option>";
							echo "<option>Miss</option>";
							echo "<option>Madam</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Mobile &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'mobile' size = '18' required = 'required' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Email &nbsp;";
						echo "<input class = 'fields-frm' type = 'email' name = 'email' size = '18' required = 'required' />";
					echo "</p>";	
				echo "</td>";
				echo "<td align = 'right' valign = 'top'>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Position &nbsp;";
						echo "<select class = 'fields-frm' name = 'position' required = 'required'>";
							echo "<option value = ''>Select the Employee Position</option>";
							echo "<option>Manager</option>";
							echo "<option>Supervisor</option>";
							echo "<option>Acountant</option>";
							echo "<option>Secretary</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Bank Name &nbsp;";
						echo "<select class = 'fields-frm' name = 'bank_name'>";
							echo "<option value = ''>Select the Bank Name</option>";
							echo "<option>CRDB</option>";
							echo "<option>NMB</option>";
							echo "<option>EXIM</option>";
							echo "<option>NBC</option>";
							echo "<option>UCHUMI</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Bank Acount &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'acount' size = '18' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Basic Salary &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'basic' size = '18' required = 'required' />";
					echo "</p>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<tr>";
				echo "<td colspan = '2'>";
					echo "<p class = 'fields-frm-par-b' align = 'center'>";
						echo "<input class='fields-frm-btn' type='submit' name='submit' value='Save' />";
					echo "</p>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employee edit form display 
	function employee_edit_frm()
		{
		//Receive employee ID
		$employee_ID = $_GET['eid'];
		
		//Table to be used
		$table_name1 = "employees";
		
// Execute the query to retrieve employee's with the received ID information
 $query1 = "SELECT *
 			FROM $table_name1
			WHERE ID = '$employee_ID'";
 $result1 = mysql_query($query1);
 $row1 = mysql_fetch_array($result1);
 	$name = $row1['Full_Name'];
	$title = $row1['Title'];
	$position = $row1['Position'];
	$mobile = $row1['Mobile'];
	$email = $row1['Email'];
	$bank_name = $row1['Bank_Name'];
	$acount = $row1['Bank_Acount'];
	$basic = $row1['Basic_Salary'];
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=employee_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<br /><br />";
 echo "<form action = 'engine.php?eng=employee_edit_eng&id=emp_edit_delete_list_dsp&class=employee_edit_frm&eid=$employee_ID' method = 'post'>";
 echo "<table class = 'data' width = '90%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";

	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Employee Editing Form</legend>";
		echo "<br />";
		echo "<table width = '100%' border = '0' cellpadding = '0' cellspacing = '0'>";
			echo "<tr>";
				echo "<td align = 'right' valign = 'top'>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Full Name &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'name' value = '$name' size = '18' required = 'required' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Title &nbsp;";
						echo "<select class = 'fields-frm' name = 'title' required = 'required'>";
							echo "<option>$title</option>";
							echo "<option value = ''>Select the Employee Title</option>";
							echo "<option>Mr.</option>";
							echo "<option>Mrs.</option>";
							echo "<option>Miss</option>";
							echo "<option>Madam</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Mobile &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'mobile' value = '$mobile' size = '18' required = 'required' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Email &nbsp;";
						echo "<input class = 'fields-frm' type = 'email' name = 'email' value = '$email' size = '18' required = 'required' />";
					echo "</p>";	
				echo "</td>";
				echo "<td align = 'right' valign = 'top'>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Position &nbsp;";
						echo "<select class = 'fields-frm' name = 'position' required = 'required'>";
							echo "<option>$position</option>";
							echo "<option value = ''>Select the Employee Position</option>";
							echo "<option>Manager</option>";
							echo "<option>Supervisor</option>";
							echo "<option>Acountant</option>";
							echo "<option>Secretary</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Bank Name &nbsp;";
						echo "<select class = 'fields-frm' name = 'bank_name'>";
								if($bank_name == '')
									{
							echo "<option value = ''>Select the Bank Name</option>";			
									}
								else
									{
							echo "<option>$bank_name</option>";			
									}
							echo "<option>CRDB</option>";
							echo "<option>NMB</option>";
							echo "<option>EXIM</option>";
							echo "<option>NBC</option>";
							echo "<option>UCHUMI</option>";
						echo "</select>";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Bank Acount &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'acount' value = '$acount' size = '18' />";
					echo "</p>";
					echo "<p class = 'fields-frm-par-b' align = 'right'>";
						echo "Basic Salary &nbsp;";
						echo "<input class = 'fields-frm' type = 'text' name = 'basic' value = '$basic' size = '18' required = 'required' />";
					echo "</p>";
				echo "</td>";
			echo "</tr>";
			echo "<tr>";
			echo "<tr>";
				echo "<td colspan = '2'>";
					echo "<p class = 'fields-frm-par-b' align = 'center'>";
						echo "<input class='fields-frm-btn' type='submit' name='submit' value='Save Changes' />";
					echo "</p>";
				echo "</td>";
			echo "</tr>";
		echo "</table>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Allowances form display 
	function allow_add_frm()
		{
		//Table to be used
		$table_name1 = "allowances";
		
// Execute the query to retrieve the allowances' information
 $query1 = "SELECT allowance_ID, Allowance, Allowance_Percent
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Allowance";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Allowances Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 echo "<br /><br />";
 echo "<form action = 'engine.php?eng=allow_rec_eng&id=allow_list_dsp&class=allow_add_frm' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Allowances Recording Form</legend>";
		echo "<br />";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowances Available &nbsp;";
			echo "<select class = 'fields-frm' name = 'available'>";
				echo "<option value = ''>View available Allowances</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '$row1[0]'>$row1[1]</option>";		
					}
			echo "</select>";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowance Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'allowance' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'right'>";
      		echo "Allowance Percent (%) &nbsp;<input class = 'fields-frm' type = 'number' name = 'percent' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='login' value='Save' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Allowance's Edit form display 
	function allow_edit_frm()
		{
		//Receive allowance ID
		$allowance_ID = $_GET['aid'];
		
		//Table to be used
		$table_name1 = "allowances";
		
// Execute the query to retrieve the allowances' information
 $query1 = "SELECT allowance_ID, Allowance, Allowance_Percent
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
//Retrieve the Allowance with the received ID
$query2 = "SELECT allowance_ID, Allowance, Allowance_Percent
			FROM $table_name1
			WHERE allowance_ID = '$allowance_ID'";
$result2 = mysql_query($query2); 
$row2 = mysql_fetch_array($result2);
	$allowance_name = $row2['Allowance'];
	$allowance_percent = $row2['Allowance_Percent'];
		 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Allowance";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Allowances Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 echo "<br /><br />";
 echo "<form action = 'engine.php?eng=allow_edit_eng&id=allow_edit_delete_list_dsp&class=allow_edit_frm&aid=$allowance_ID' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Allowances Editing Form</legend>";
		echo "<br />";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowances Available &nbsp;";
			echo "<select class = 'fields-frm' name = 'available'>";
				echo "<option value = ''>View available Allowances</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '$row1[0]'>$row1[1]</option>";		
					}
			echo "</select>";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowance Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'allowance' value = '$allowance_name' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'right'>";
      		echo "Allowance Percent (%) &nbsp;<input class = 'fields-frm' type = 'number' name = 'percent' value = '$allowance_percent' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='login' value='Save Changes' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' Allowances Assignment form display 
	function emp_allow_assign_frm()
		{
		//Receive employee ID
		$emp_ID = $_GET['eid'];
		
		//Table to be used
		$table_name1 = "allowances";
		$table_name2 = "employees";
		$table_name3 = "allowances_employees";
		
// Execute the query to retrieve the allowances' information
 $query1 = "SELECT allowance_ID, Allowance, Allowance_Percent
 			FROM $table_name1
			WHERE allowance_ID NOT IN(SELECT allowance_ID FROM $table_name3 WHERE ID = '$emp_ID')";
 $result1 = mysql_query($query1);
 
 //The query to retrieve the selected employee info
 $query2 = "SELECT employee_ID, Full_Name FROM $table_name2 WHERE ID = '$emp_ID'";
 $result2 = mysql_query($query2);
 $row2 = mysql_fetch_array($result2);
 	$employee_ID = $row2['employee_ID'];
 	$emp_name = $row2['Full_Name'];
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Allowances";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_allow_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 echo "<br /><br />";
 echo "<form action = 'engine.php?eng=emp_allow_assign_eng&id=emp_allow_list_dsp&class=emp_allow_assign_frm&eid=$emp_ID' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Employees' Allowances Assigning Form</legend>";
		echo "<br />";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Employee Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'name' value = '$emp_name' size = '18' disabled = 'disabled' />";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Employee ID &nbsp;<input class = 'fields-frm' type = 'text' name = 'id' value = '$employee_ID' size = '18' disabled = 'disabled' />";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowances Not Assigned &nbsp;";
			echo "<select class = 'fields-frm' name = 'allowance' required = 'true'>";
				echo "<option value = ''>Select the Allowance to Assign</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '" . $row1[0] . "'>$row1[1] ($row1[2] %)</option>";		
					}
			echo "</select>";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='submit' value='Assign' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Deduction form display 
	function ded_add_frm()
		{
		//Table to be used
		$table_name1 = "deductions";
		
// Execute the query to retrieve the deductions' information
 $query1 = "SELECT deduction_ID, Deduction
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Deduction";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Deductions Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 echo "<br /><br />";
 echo "<form action = 'engine.php?eng=ded_rec_eng&id=ded_list_dsp&class=ded_add_frm' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Deduction Recording Form</legend>";
		echo "<br />";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowances Deductions &nbsp;";
			echo "<select class = 'fields-frm' name = 'available'>";
				echo "<option value = ''>View available Deductions</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '$row1[0]'>$row1[1]</option>";		
					}
			echo "</select>";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Deduction Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'deduction' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='login' value='Save' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Deduction Edit form display 
	function ded_edit_frm()
		{
		//Receive deduction ID
		$deduction_ID = $_GET['did'];
		
		//Table to be used
		$table_name1 = "deductions";
		
// Execute the query to retrieve the deductions' information
$query1 = "SELECT deduction_ID, Deduction
 			FROM $table_name1";
$result1 = mysql_query($query1);

// Execute the query to retrieve the deduction with the received ID
$query2 = "SELECT Deduction
 			FROM $table_name1
			WHERE deduction_ID = '$deduction_ID'";
$result2 = mysql_query($query2);
$row2 = mysql_fetch_array($result2);
	$deduction_name = $row2['Deduction'];
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_add_frm'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;New Deduction";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = 'default.php?id=ded_edit_delete_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign to Employee";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_d'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Deductions Allocation";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '5' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 echo "<br /><br />";
 echo "<form action = 'engine.php?eng=ded_edit_eng&id=ded_edit_delete_list_dsp&class=ded_edit_frm&did=$deduction_ID' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Deduction Edit Form</legend>";
		echo "<br />";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Allowances Deductions &nbsp;";
			echo "<select class = 'fields-frm' name = 'available'>";
				echo "<option value = ''>View available Deductions</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '$row1[0]'>$row1[1]</option>";		
					}
			echo "</select>";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Deduction Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'deduction' value = '$deduction_name' size = '18' required = 'required' />";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='login' value='Save Changes' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' Deductions Assignment form display 
	function emp_ded_assign_frm()
		{
		//Receive employee ID
		$emp_ID = $_GET['eid'];
		
		//Table to be used
		$table_name1 = "deductions";
		$table_name2 = "employees";
		$table_name3 = "deductions_employees";
		
// Execute the query to retrieve the deductions' information
 $query1 = "SELECT deduction_ID, Deduction
 			FROM $table_name1
			WHERE deduction_ID NOT IN(SELECT deduction_ID FROM $table_name3 WHERE ID = '$emp_ID')";
 $result1 = mysql_query($query1);
 
 //The query to retrieve the selected employee info
 $query2 = "SELECT employee_ID, Full_Name FROM $table_name2 WHERE ID = '$emp_ID'";
 $result2 = mysql_query($query2);
 $row2 = mysql_fetch_array($result2);
 	$employee_ID = $row2['employee_ID'];
 	$emp_name = $row2['Full_Name'];
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_ded_assign_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Assign Deductions";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_b'>";
			echo "<a class = 'inner' href = '#'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Edit / Delete";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
 //echo "<br />";
 echo "<form action = 'engine.php?eng=emp_ded_assign_eng&id=emp_ded_list_dsp&class=emp_ded_assign_frm&eid=$emp_ID' method = 'post'>";
 echo "<table class = 'data' width = '60%' border = '0' cellpadding = '1' cellspacing = '0'>";
 	echo "<tr>";
		echo "<td colspan = '2'>";
		
	echo "<fieldset class = 'fieldset-frm' width = '500px'>";
    	echo "<legend class = 'legend-frm'>Employees' Deduction Assigning Form</legend>";

		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Employee Name &nbsp;<input class = 'fields-frm' type = 'text' name = 'name' value = '$emp_name' size = '18' disabled = 'disabled' />";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Employee ID &nbsp;<input class = 'fields-frm' type = 'text' name = 'id' value = '$employee_ID' size = '18' disabled = 'disabled' />";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
			echo "Deductions Not Assigned &nbsp;";
			echo "<select class = 'fields-frm' name = 'deduction' required = 'true'>";
				echo "<option value = ''>Select the Deduction to Assign</option>";
				while($row1 = mysql_fetch_array($result1))
   					{
				echo "<option value = '" . $row1[0] . "'>$row1[1]</option>";		
					}
			echo "</select>";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
      		echo "Deduction Percent (%) &nbsp;<input class = 'fields-frm' type = 'number' name = 'percent' size = '18' required = 'required' />";
    	echo "</p>";
		echo "<p class = 'fields-frm-par' align = 'right'>";
      		echo "Deduction Description &nbsp;";
			echo "<textarea class = 'fields-frm' name = 'desc' cols = '16' rows = '2'></textarea>";
    	echo "</p>";
    	echo "<p class = 'fields-frm-par' align = 'center'>";
    		echo "<input class='fields-frm-btn' type='submit' name='submit' value='Assign' />";
    	echo "</p>";
    echo "</fieldset>";

		echo "</td>";
	echo "</tr>";
echo "</table>";
echo "</form>";

 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' Salary list display 
	function emp_salary_list_dsp()
		{
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_employees";
		$table_name4 = "deductions";
		$table_name5 = "deductions_employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Basic_Salary
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Employees' Salaries";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '2' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees with Salary specifications</b></font>";
echo "<br />";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th colspan = '" . $num_row2 . "'>Allowances</th><th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th></tr>";
 echo "<tr>";
 	// Display the Allowances available
	while($row2 = mysql_fetch_array($result2))
		{
 echo "<th>" . $row2['Allowance'] . "</th>";
		}
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE ID = '" . $row1['ID'] ."' AND allowance_ID = '" . $allowance_ID . "'";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name5 ";
			$query8 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// Function Employees' Pay Salary list display 
	function emp_pay_salary_list_dsp()
		{
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_employees";
		$table_name4 = "deductions";
		$table_name5 = "deductions_employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Bank_Name, Bank_Acount, Basic_Salary
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_pay_salary_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Pay Salaries";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_payment_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees to be Paid Salaries</b></font>";
echo "<br />";

echo "<form method = 'post' action = 'engine.php?eng=emp_pay_salary_eng&id=emp_pay_salary_list_dsp' >";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr bgcolor = '#CCCCCC'>";
 	echo "<th colspan = '12' align = 'right'>";
		echo "Month:&nbsp;<select name = 'month' required = 'True'>";
			echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
			echo "<option value = '01'>January</option>";
			echo "<option value = '02'>February</option>";
			echo "<option value = '03'>March</option>";
			echo "<option value = '04'>April</option>";
			echo "<option value = '05'>May</option>";
			echo "<option value = '06'>June</option>";
			echo "<option value = '07'>July</option>";
			echo "<option value = '08'>August</option>";
			echo "<option value = '09'>September</option>";
			echo "<option value = '10'>October</option>";
			echo "<option value = '11'>November</option>";
			echo "<option value = '12'>December</option>";
		echo "</select>";
		echo "&nbsp;&nbsp;";
		echo "Year:&nbsp;<select name = 'year' required = 'True'>";
			echo "<option>" . date("Y", time()) . "</option>";
		echo "</select>";
		echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href = 'default.php?id=emp_pay_salary_list2_dsp'>Check All</a>";
	echo "</th>";
 echo "</tr>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Bank Name</th><th rowspan = '2'>Bank Account</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>&nbsp;</th></tr>";
 echo "<tr>";
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td>" . $row1['Bank_Name'] . "</td>";
		echo "<td>" . $row1['Bank_Acount'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE ID = '" . $row1['ID'] ."' AND allowance_ID = '" . $allowance_ID . "'";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				//echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				//echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name5 ";
			$query8 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'right'><input type='checkbox' name='pay_check[]' value='$row1[0]' /></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 	echo "<tr bgcolor = '#CCCCCC'><td colspan = '12' align = 'right'><input type = 'submit' value = 'Pay Salary' /></td></tr>";
 echo "</table>";
 echo "</form>";
 
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Employees' Pay Salary list display 
	function emp_pay_salary_list2_dsp()
		{
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_employees";
		$table_name4 = "deductions";
		$table_name5 = "deductions_employees";
		
// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Bank_Name, Bank_Acount, Basic_Salary
 			FROM $table_name1";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_pay_salary_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Pay Salaries";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_payment_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'justify' valign = 'middle'>&nbsp;&nbsp;";
			echo "&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees to be Paid Salaries</b></font>";
echo "<br />";

echo "<form method = 'post' action = 'engine.php?eng=emp_pay_salary_eng&id=emp_pay_salary_list_dsp' >";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr bgcolor = '#CCCCCC'>";
 	echo "<th colspan = '12' align = 'right'>";
		echo "Month:&nbsp;<select name = 'month' required = 'True'>";
			echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
			echo "<option value = '01'>January</option>";
			echo "<option value = '02'>February</option>";
			echo "<option value = '03'>March</option>";
			echo "<option value = '04'>April</option>";
			echo "<option value = '05'>May</option>";
			echo "<option value = '06'>June</option>";
			echo "<option value = '07'>July</option>";
			echo "<option value = '08'>August</option>";
			echo "<option value = '09'>September</option>";
			echo "<option value = '10'>October</option>";
			echo "<option value = '11'>November</option>";
			echo "<option value = '12'>December</option>";
		echo "</select>";
		echo "&nbsp;&nbsp;";
		echo "Year:&nbsp;<select name = 'year' required = 'True'>";
			echo "<option>" . date("Y", time()) . "</option>";
		echo "</select>";
		echo "&nbsp;&nbsp;|&nbsp;&nbsp;<a href = 'default.php?id=emp_pay_salary_list_dsp'>Uncheck All</a>";
	echo "</th>";
 echo "</tr>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Bank Name</th><th rowspan = '2'>Bank Account</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>&nbsp;</th></tr>";
 echo "<tr>";
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td>" . $row1['Bank_Name'] . "</td>";
		echo "<td>" . $row1['Bank_Acount'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE ID = '" . $row1['ID'] ."' AND allowance_ID = '" . $allowance_ID . "'";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				//echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				//echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name5 ";
			$query8 .= "WHERE ID = '" . $row1['ID'] ."' AND deduction_ID = '" . $deduction_ID . "'";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'right'><input type='checkbox' name='pay_check[]' checked = 'True' value='$row1[0]' /></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 	echo "<tr bgcolor = '#CCCCCC'><td colspan = '12' align = 'right'><input type = 'submit' value = 'Pay Salary' /></td></tr>";
 echo "</table>";
 echo "</form>";
 
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Employees' Salary Payments list display 
	function emp_salary_payment_list_dsp()
		{
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";
		
// Retrieve years recorded
$query0 = "SELECT DISTINCT(Year) AS Year FROM $table_name7";
$result0 = mysql_query($query0);

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year, Payment_Date FROM $table_name7 ";
	$query .= "WHERE Month = '" . date("m", time()) . "' AND Year = '" . date("Y", time()) . "'";
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
 $query1 = "SELECT ID, employee_ID, Full_Name, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID IN(SELECT ID FROM $table_name6 WHERE sal_pay_date_ID = '$sal_pay_date_ID')";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_pay_salary_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Pay Salaries";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_payment_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'right' valign = 'middle'>";
			echo "<form method = 'post' action = 'default.php?id=emp_salary_payment_list2_dsp'>";
				echo "Month:&nbsp;<select name = 'month' required = 'True'>";
				echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
				echo "<option value = '01'>January</option>";
				echo "<option value = '02'>February</option>";
				echo "<option value = '03'>March</option>";
				echo "<option value = '04'>April</option>";
				echo "<option value = '05'>May</option>";
				echo "<option value = '06'>June</option>";
				echo "<option value = '07'>July</option>";
				echo "<option value = '08'>August</option>";
				echo "<option value = '09'>September</option>";
				echo "<option value = '10'>October</option>";
				echo "<option value = '11'>November</option>";
				echo "<option value = '12'>December</option>";
			echo "</select>";
			echo "&nbsp;&nbsp;";
			echo "Year:&nbsp;<select name = 'year' required = 'True'>";
				echo "<option>" . date("Y", time()) . "</option>";
			while($row0 = mysql_fetch_array($result0))
				{
				echo "<option>" . $row0['Year'] . "</option>";	
				}
			echo "</select>";
			echo "&nbsp;<input type = 'submit' value = 'Search' />";
			echo "</form>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Paid Salaries for Month $month_words, $year <br /> made on $pay_date</b></font>";
echo "<br />";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th colspan = '" . $num_row2 . "'>Allowances</th><th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>Paid</th></tr>";
 echo "<tr>";
 	// Display the Allowances available
	while($row2 = mysql_fetch_array($result2))
		{
 echo "<th>" . $row2['Allowance'] . "</th>";
		}
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has paid this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE allowance_ID = '" . $allowance_ID . "' ";
			$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query5 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query5 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has paid this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE deduction_ID = '" . $deduction_ID . "' ";
			$query7 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query7 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query7 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query8 .= "WHERE deduction_ID IN(SELECT DISTINCT(deduction_ID) FROM $table_name8 WHERE deduction_ID = '" . $deduction_ID . "')";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'center'><img src = 'Images/pick.png' /></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Employees' Salary Payments list display 
	function emp_salary_payment_list2_dsp()
		{
		// Receive form inputs
		$mwezi = $_POST['month'];
		$mwaka = $_POST['year'];
		
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";
		
// Retrieve years recorded
$query0 = "SELECT DISTINCT(Year) AS Year FROM $table_name7";
$result0 = mysql_query($query0);

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year, Payment_Date FROM $table_name7 ";
	$query .= "WHERE Month = '$mwezi' AND Year = '$mwaka'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$sal_pay_date_ID = $row['sal_pay_date_ID'];
	$month = $row['Month'];
	$year = $row['Year'];
	$pay_date = $row['Payment_Date'];
	if($mwezi == "01"){$month_words = "January"; }
	else if($mwezi == "02")	{$month_words = "February"; }
	else if($mwezi == "03")	{$month_words = "March"; }
	else if($mwezi == "04")	{$month_words = "April"; }
	else if($mwezi == "05")	{$month_words = "May"; }
	else if($mwezi == "06")	{$month_words = "June"; }
	else if($mwezi == "07")	{$month_words = "July"; }
	else if($mwezi == "08")	{$month_words = "August"; }
	else if($mwezi == "09")	{$month_words = "September"; }
	else if($mwezi == "10")	{$month_words = "October"; }
	else if($mwezi == "11")	{$month_words = "November"; }
	else 	{$month_words = "December"; }

// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID IN(SELECT ID FROM $table_name6 WHERE sal_pay_date_ID = '$sal_pay_date_ID')";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_pay_salary_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Pay Salaries";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_payment_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'right' valign = 'middle'>";
			echo "<form method = 'post' action = 'default.php?id=emp_salary_payment_list2_dsp'>";
				echo "Month:&nbsp;<select name = 'month' required = 'True'>";
				echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
				echo "<option value = '01'>January</option>";
				echo "<option value = '02'>February</option>";
				echo "<option value = '03'>March</option>";
				echo "<option value = '04'>April</option>";
				echo "<option value = '05'>May</option>";
				echo "<option value = '06'>June</option>";
				echo "<option value = '07'>July</option>";
				echo "<option value = '08'>August</option>";
				echo "<option value = '09'>September</option>";
				echo "<option value = '10'>October</option>";
				echo "<option value = '11'>November</option>";
				echo "<option value = '12'>December</option>";
			echo "</select>";
			echo "&nbsp;&nbsp;";
			echo "Year:&nbsp;<select name = 'year' required = 'True'>";
				echo "<option>" . date("Y", time()) . "</option>";
			while($row0 = mysql_fetch_array($result0))
				{
				echo "<option>" . $row0['Year'] . "</option>";	
				}
			echo "</select>";
			echo "&nbsp;<input type = 'submit' value = 'Search' />";
			echo "</form>";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Paid Salaries for Month $month_words, $mwaka <br /> made on $pay_date</b></font>";
echo "<br />";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th colspan = '" . $num_row2 . "'>Allowances</th><th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>Paid</th></tr>";
 echo "<tr>";
 	// Display the Allowances available
	while($row2 = mysql_fetch_array($result2))
		{
 echo "<th>" . $row2['Allowance'] . "</th>";
		}
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has paid this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE allowance_ID = '" . $allowance_ID . "' ";
			$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query5 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query5 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has paid this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE deduction_ID = '" . $deduction_ID . "' ";
			$query7 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query7 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query7 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query8 .= "WHERE deduction_ID IN(SELECT DISTINCT(deduction_ID) FROM $table_name8 WHERE deduction_ID = '" . $deduction_ID . "')";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'center'><img src = 'Images/pick.png' /></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Employees' Salary Slip list display 
	function emp_salary_slip_list_dsp()
		{
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";
		
// Retrieve years recorded
$query0 = "SELECT DISTINCT(Year) AS Year FROM $table_name7";
$result0 = mysql_query($query0);

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year FROM $table_name7 ";
	$query .= "WHERE Month = '" . date("m", time()) . "' AND Year = '" . date("Y", time()) . "'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$sal_pay_date_ID = $row['sal_pay_date_ID'];
	$month = $row['Month'];
	$year = $row['Year'];
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
 $query1 = "SELECT ID, employee_ID, Full_Name, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID IN(SELECT ID FROM $table_name6 WHERE sal_pay_date_ID = '$sal_pay_date_ID')";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_slip_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'right' valign = 'middle'>";
			echo "<form method = 'post' action = 'default.php?id=emp_salary_slip_list2_dsp'>";
				echo "Month:&nbsp;<select name = 'month' required = 'True'>";
				echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
				echo "<option value = '01'>January</option>";
				echo "<option value = '02'>February</option>";
				echo "<option value = '03'>March</option>";
				echo "<option value = '04'>April</option>";
				echo "<option value = '05'>May</option>";
				echo "<option value = '06'>June</option>";
				echo "<option value = '07'>July</option>";
				echo "<option value = '08'>August</option>";
				echo "<option value = '09'>September</option>";
				echo "<option value = '10'>October</option>";
				echo "<option value = '11'>November</option>";
				echo "<option value = '12'>December</option>";
			echo "</select>";
			echo "&nbsp;&nbsp;";
			echo "Year:&nbsp;<select name = 'year' required = 'True'>";
				echo "<option>" . date("Y", time()) . "</option>";
			while($row0 = mysql_fetch_array($result0))
				{
				echo "<option>" . $row0['Year'] . "</option>";	
				}
			echo "</select>";
			echo "&nbsp;<input type = 'submit' value = 'Search' />";
			echo "</form>";
		echo "</td><td align = 'right' valign = 'middle' width = '210px'>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a class = 'print-link' href = 'engine.php?eng=send_emails_list_eng&id=emp_salary_slip_list_dsp&spd_ID=$sal_pay_date_ID' title = 'Send Email'>";
			echo "<img src = 'Images/mail-icon.png' />&nbsp;Send Slips via Email";
			echo "</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Salary Slips Salaries of Month $month_words, $year</b></font>";
echo "<br />";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th colspan = '" . $num_row2 . "'>Allowances</th><th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>View<br />Slip</th></tr>";
 echo "<tr>";
 	// Display the Allowances available
	while($row2 = mysql_fetch_array($result2))
		{
 echo "<th>" . $row2['Allowance'] . "</th>";
		}
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has paid this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE allowance_ID = '" . $allowance_ID . "' ";
			$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query5 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query5 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has paid this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE deduction_ID = '" . $deduction_ID . "' ";
			$query7 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query7 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query7 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query8 .= "WHERE deduction_ID IN(SELECT DISTINCT(deduction_ID) FROM $table_name8 WHERE deduction_ID = '" . $deduction_ID . "')";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'center'><a href = 'default.php?id=emp_salary_slip&eid=$row1[0]&spd_ID=$sal_pay_date_ID'><img src = 'Images/pick.png' /></a></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Function Employees' Salary Slip list display 
	function emp_salary_slip_list2_dsp()
		{
		// Receive form inputs
		$mwezi = $_POST['month'];
		$mwaka = $_POST['year'];
		
		//Tables to be used
		$table_name1 = "employees";
		$table_name2 = "allowances";
		$table_name3 = "allowances_payments";
		$table_name4 = "deductions";
		$table_name5 = "deductions_payments";
		$table_name6 = "salary_payments";
		$table_name7 = "salary_payment_dates";
		$table_name8 = "deductions_employees";
		
// Retrieve years recorded
$query0 = "SELECT DISTINCT(Year) AS Year FROM $table_name7";
$result0 = mysql_query($query0);

// Retrieve Salary Payment date info
	$query = "SELECT sal_pay_date_ID, Month, Year FROM $table_name7 ";
	$query .= "WHERE Month = '$mwezi' AND Year = '$mwaka'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	$sal_pay_date_ID = $row['sal_pay_date_ID'];
	$month = $row['Month'];
	$year = $row['Year'];
	
	if($mwezi == "01"){$month_words = "January"; }
	else if($mwezi == "02")	{$month_words = "February"; }
	else if($mwezi == "03")	{$month_words = "March"; }
	else if($mwezi == "04")	{$month_words = "April"; }
	else if($mwezi == "05")	{$month_words = "May"; }
	else if($mwezi == "06")	{$month_words = "June"; }
	else if($mwezi == "07")	{$month_words = "July"; }
	else if($mwezi == "08")	{$month_words = "August"; }
	else if($mwezi == "09")	{$month_words = "September"; }
	else if($mwezi == "10")	{$month_words = "October"; }
	else if($mwezi == "11")	{$month_words = "November"; }
	else 	{$month_words = "December"; }

// Execute the query to retrieve the employees' information
 $query1 = "SELECT ID, employee_ID, Full_Name, Basic_Salary ";
 $query1 .= "FROM $table_name1 ";
 $query1 .= "WHERE ID IN(SELECT ID FROM $table_name6 WHERE sal_pay_date_ID = '$sal_pay_date_ID')";
 $result1 = mysql_query($query1);
 
 // Query to retrieve allowances
 $query2 = "SELECT * FROM $table_name2 ORDER BY allowance_ID";
 $result2 = mysql_query($query2);
 $num_row2 = mysql_num_rows($result2);
 
 // Query to retrieve deductions
 $query3 = "SELECT * FROM $table_name4 ORDER BY deduction_ID";
 $result3 = mysql_query($query3);
 $num_row3 = mysql_num_rows($result3);
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_slip_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'right' valign = 'middle'>";
			echo "<form method = 'post' action = 'default.php?id=emp_salary_slip_list2_dsp'>";
				echo "Month:&nbsp;<select name = 'month' required = 'True'>";
				echo "<option value = '" . date("m", time()) . "'>" . date("F", time()) . "</option>";
				echo "<option value = '01'>January</option>";
				echo "<option value = '02'>February</option>";
				echo "<option value = '03'>March</option>";
				echo "<option value = '04'>April</option>";
				echo "<option value = '05'>May</option>";
				echo "<option value = '06'>June</option>";
				echo "<option value = '07'>July</option>";
				echo "<option value = '08'>August</option>";
				echo "<option value = '09'>September</option>";
				echo "<option value = '10'>October</option>";
				echo "<option value = '11'>November</option>";
				echo "<option value = '12'>December</option>";
			echo "</select>";
			echo "&nbsp;&nbsp;";
			echo "Year:&nbsp;<select name = 'year' required = 'True'>";
				echo "<option>" . date("Y", time()) . "</option>";
			while($row0 = mysql_fetch_array($result0))
				{
				echo "<option>" . $row0['Year'] . "</option>";	
				}
			echo "</select>";
			echo "&nbsp;<input type = 'submit' value = 'Search' />";
			echo "</form>";
		echo "</td><td align = 'right' valign = 'middle' width = '210px'>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a class = 'print-link' href = 'engine.php?eng=send_emails_list_eng&id=emp_salary_slip_list_dsp&spd_ID=$sal_pay_date_ID' title = 'Send Email'>";
			echo "<img src = 'Images/mail-icon.png' />&nbsp;Send Slips via Email";
			echo "</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '3' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
echo "<center>";
echo "<font size = '5'><b>List of Employees' Salary Slips for Salaries of Month $month_words, $mwaka</b></font>";
echo "<br />";
 echo "<table class = 'data2' width = '100%' border = '1' cellpadding = '1' cellspacing = '0'>";
 echo "<tr><th rowspan = '2'>No.</th><th rowspan = '2'>Employee Name</th><th rowspan = '2'>Basic Salary</th>";
 echo "<th colspan = '" . $num_row2 . "'>Allowances</th><th rowspan = '2'>Gross Salary</th>";
 echo "<th colspan = '" . $num_row3 . "'>Deductions</th><th rowspan = '2'>TAX</th><th rowspan = '2'>Net Pay</th><th rowspan = '2'>View<br />Slip</th></tr>";
 echo "<tr>";
 	// Display the Allowances available
	while($row2 = mysql_fetch_array($result2))
		{
 echo "<th>" . $row2['Allowance'] . "</th>";
		}
	// Display the Deductions available
	while($row3 = mysql_fetch_array($result3))
		{
 echo "<th>" . $row3['Deduction'] . "</th>";
		}
 echo "</tr>";
 	$no = 1; $total_gross = 0;
	while($row1 = mysql_fetch_array($result1))
		{
	echo "<tr>";
		echo "<td>" . $no . ".</td>";
		echo "<td>" . $row1['Full_Name'] . "</td>";
		echo "<td align = 'right'>" . number_format($row1['Basic_Salary'], 2, '.', ',') . "</td>";
		
			$allo_qty = 1; $min_allowance_ID = 0;
			$total_gross = $total_gross + $row1['Basic_Salary'];
			while($allo_qty <= $num_row2)
				{
			// Query to retrieve the Allowance with the minimum ID
			$query4 = "SELECT allowance_ID, Allowance_Percent FROM $table_name2 ";
			$query4 .= "WHERE allowance_ID = (SELECT MIN(allowance_ID) FROM $table_name2 WHERE allowance_ID > $min_allowance_ID)";
			$result4 = mysql_query($query4);
			$row4 = mysql_fetch_array($result4);
				$allowance_ID = $row4['allowance_ID'];	
				$allowance_percent = $row4['Allowance_Percent'];
				
			// Check whether the employee has paid this allowance
			$query5 = "SELECT COUNT(*) AS COUNT FROM $table_name3 ";
			$query5 .= "WHERE allowance_ID = '" . $allowance_ID . "' ";
			$query5 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query5 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query5 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result5 = mysql_query($query5);
			$row5 = mysql_fetch_array($result5);
			 	$count5 = $row5['COUNT'];
			 
			 	if($count5 > 0)
					{
				// Calculate the Allowance amount
				$allowance_amount = $row1['Basic_Salary'] * $allowance_percent / 100;
				
				echo "<td align = 'right'>" . number_format($allowance_amount, 2, '.', ',') . "</td>";
				$total_gross += $allowance_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$allo_qty ++;
				// Update minimum Allowance ID
				$min_allowance_ID = $allowance_ID;
				}
		echo "<td align = 'right'>" . number_format($total_gross, 2, '.', ',') . "</td>";
		
			$deduction_qty = 1; $min_deduction_ID = 0;
			$total_net = $total_gross; $taxable_amount = $total_gross;
			while($deduction_qty <= $num_row3)
				{
			// Query to retrieve the Deduction with the minimum ID
			$query6 = "SELECT deduction_ID, Deduction FROM $table_name4 ";
			$query6 .= "WHERE deduction_ID = 
						(SELECT MIN(deduction_ID) FROM $table_name4 WHERE deduction_ID > $min_deduction_ID) ";
			$result6 = mysql_query($query6);
			$row6 = mysql_fetch_array($result6);
				$deduction_ID = $row6['deduction_ID'];
				$deduction = $row6['Deduction'];
				
			// Check whether the employee has paid this deduction
			$query7 = "SELECT COUNT(*) AS COUNT FROM $table_name5 ";
			$query7 .= "WHERE deduction_ID = '" . $deduction_ID . "' ";
			$query7 .= "AND sal_pay_ID IN(SELECT sal_pay_ID FROM $table_name6 WHERE ID = '" . $row1['ID'] ."' ";
			$query7 .= "AND sal_pay_date_ID IN(SELECT sal_pay_date_ID FROM $table_name7 ";
			$query7 .= "WHERE Month = '$month' AND Year = '$year'))";
			$result7 = mysql_query($query7);
			$row7 = mysql_fetch_array($result7);
			 	$count7 = $row7['COUNT'];
			 
			 	if($count7 > 0)
					{
			// Retrieve the percent of the deduction to the employee
			$query8 = "SELECT Deduction_Percent FROM $table_name8 ";
			$query8 .= "WHERE deduction_ID IN(SELECT DISTINCT(deduction_ID) FROM $table_name8 WHERE deduction_ID = '" . $deduction_ID . "')";
			$result8 = mysql_query($query8);
			$row8 = mysql_fetch_array($result8);
			 	$deduction_percent = $row8['Deduction_Percent'];
						
				// Calculate the Deduction amount
				$deduction_amount = $total_gross * $deduction_percent / 100;
					if($deduction == "NSSF" || $deduction == "LAPF")
						{
							$taxable_amount -= $deduction_amount; 	
						}
				
				echo "<td align = 'right'>" . number_format($deduction_amount, 2, '.', ',') . "</td>";
				$total_net -= $deduction_amount;
					}
				else 
					{
				echo "<td align = 'right'> ~ </td>";		
					}
				// Increment number
				$deduction_qty ++;
				// Update minimum Deduction ID
				$min_deduction_ID = $deduction_ID;
				}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////				
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
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// Deduct TAX from Gross
		$total_net -= $tax_amount;
		echo "<td align = 'right'>" . number_format($tax_amount, 2, '.', ',') . "</td>";
		echo "<td align = 'right'>" . number_format($total_net, 2, '.', ',') . "</td>";
		echo "<td align = 'center'><a href = 'default.php?id=emp_salary_slip&eid=$row1[0]&spd_ID=$sal_pay_date_ID'><img src = 'Images/pick.png' /></a></td>";	
	echo "</tr>";
	$no ++;
	// Reset gross total
	$total_gross = 0;
	// Reset net pay total
	$total_net = 0;	
		}
 
 echo "</table>";
 echo "</center>";
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
 
 echo "<table class = 'inner_table' border = '0' cellspacing = '0' cellpadding = '0'>";
 	echo "<tr class = 'inn_tab_head' valign = 'bottom'>";
		echo "<td class = 'inn_tab_td_c'>";
			echo "<a class = 'inner' href = 'default.php?id=emp_salary_slip_list_dsp'>";
				echo "<div class = 'inn_tab_td_link_div'>";
					echo "&nbsp;Salary Payments";
				echo "</div>";
			echo "</a>";
		echo "</td>";
		echo "<td align = 'right' valign = 'middle'>";
			echo "<a class = 'print-link' href = 'printable.php?id=emp_salary_slip&eid=$emp_ID&spd_ID=$spd_ID' target = '_blank' title = 'Print Slip'>";
			echo "<img src = 'Images/print.png' />&nbsp;Print Slip";
			echo "</a>";
			echo "&nbsp;&nbsp;|&nbsp;&nbsp;";
			echo "<a class = 'print-link' href = 'engine.php?eng=send_email_eng&id=emp_salary_slip&eid=$emp_ID&spd_ID=$spd_ID' title = 'Send Email'>";
			echo "<img src = 'Images/mail-icon.png' />&nbsp;Send via Email";
			echo "</a>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td colspan = '2' align = 'center' valign = 'top'>";
			echo "<div class = 'display_area'>";
			
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
			
			echo "</div>";
		echo "</td>";
	echo "</tr>";
 echo "</table>";
 
 		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// End of Forms display	////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//The end of functions definitions																					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Calling the Function
	echo $ID();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
mysql_close($con); 

?>