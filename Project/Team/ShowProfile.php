<?php
include("../Connection/Connection.php");
	session_start();
	  $selQry="select * from tbl_team where team_id='".$_SESSION['tid']."'"; 
	 
	  $sel=mysql_query($selQry,$conn)or die(mysql_error());
	  $row=mysql_fetch_array($sel)or die(mysql_error());

	  include("Head.php");
	  ?>




	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ShowProfile</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
<div align="center">
  <table width="400" border="1">
  <tr>
    <td>Name</td>
    <td><?php echo $row['team_name'];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['team_contact'];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['team_email'];?></td>
  </tr>
</table>
</body>
<br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>