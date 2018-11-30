<?php
	if($_SESSION['user'] == "")
		{
		header("Location: out.php");	
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payroll Management Information System</title>
	<link href="Styles/style.css" rel="stylesheet" type="text/css" />
	<SCRIPT type="text/javascript">
		window.history.forward();
		function noBack() { window.history.forward(); }
	</SCRIPT>
</head>
<body id="main-back" onLoad="noBack();"
    onpageshow="if (event.persisted) noBack();" onUnload="">
	<center>
    <table id="main" border="0" cellspacing="0" cellpadding="0">
    	<tr class="row-head">
        	<td>
            	<img src="Images/head.png" width="100%"  />
            </td>
        </tr>
        <tr class="row-content">
        	<td>
            	<table height="100%" width="100%" border="0" cellspacing="0" cellpadding="0">
                	<tr height="20px">
                    	<td colspan="2" align="right" valign="middle">
                        	<font style="font-family:Cambria; font-size:14px; letter-spacing:1px;">
							<?php echo $_SESSION['position'] . " - " . $_SESSION['title'] . " " . $_SESSION['name'] ?>	&nbsp;
                        	</font>
                        </td>
                    </tr>
                    <tr height="495px">
                    	<td class="col-menu" align="center" valign="top">
                        	<table class="menu-tab" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" valign="top">
                                        <?php require('Includes/menu.php'); ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="col-content" align="center" valign="top">
                            <div class="div-content">
                            	<?php include('Includes/data.php'); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>	
        <tr class="row-footer">
        	<td align="center" valign="middle">
            	<?php
					echo "Copyright &copy; " . date("Y", time()) . " Hale Sisal Estate - Payroll Management Information System";
				?>
            </td>
        </tr>	
    </table>
    </center>
</body>
</html>