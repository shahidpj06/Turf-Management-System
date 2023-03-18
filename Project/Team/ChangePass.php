<?php
include("../Connection/Connection.php");
if(isset($_POST['btnSubmit']))
{
	session_start();
	  $selQry="select * from tbl_team where team_id='".$_SESSION['tid']."'"; 
	  $sellog=mysql_query($selQry);
	  $count=mysql_num_rows($sellog);
	 
	  if($count>0)
	  {
		  $upQry="update tbl_team set team_password='".$_POST['passNew']."'where team_id='".$_SESSION['tid']."'";
		  mysql_query($upQry)or die(mysql_error());
		  echo"<b>Updated Completed Successfully!";
	  }
	  else
	  {
		  echo"<b>Invalid Password!!!";
	  }
}
include("Head.php");
?>


















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table >
    <tr>
      <td>Current Password</td>
      <td><label for="txtCurrent"></label>
      <input type="text" required="required" pattern"{3,36}" name="txtCurrent" id="txtCurrent" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="passNew"></label>
      <input type="text" required="required" pattern"{3,36}" name="passNew" id="passNew" /></td>
    </tr>
    <tr>
      <td>Confirm Password</td>
      <td><label for="passRetype"></label>
      <input type="text" required="required" pattern"{3,36}" name="passConfirm" id="passConfirm" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Update" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<br />
<br />
<br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>