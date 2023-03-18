<?php
include("../Connection/Connection.php");
	session_start();
	  $selQry="select * from tbl_towner where towner_id='".$_SESSION['toid']."'";
	  $sel=mysql_query($selQry,$conn)or die(mysql_error());
	  $row=mysql_fetch_array($sel)or die(mysql_error());
	  include("Links.php");
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
<table width="200" border="1" align="center">
  <tr>
    <td>Name</td>
    <td><?php echo $row['towner_name'];?></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><?php echo $row['towner_contact'];?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $row['towner_email'];?></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><?php echo $row['towner_address'];?></td>
  </tr>
</table>
</body>
<br />
<br /><br />
<br /><br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>