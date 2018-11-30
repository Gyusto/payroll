<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payroll Management Information System</title>
	<link href="Styles/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
		function printpage()
		{
		window.print();
		}
	</script>
</head>
<body onload="printpage()">
	<center>
    <?php 
		//Receive Operation ID
		$ID = $_GET['id'];	
	?>
	<?php include('Includes/print.php'); ?>
    </center>
</body>
</html>