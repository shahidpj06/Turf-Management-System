<?php
include("../Connection/Connection.php");
	session_start();
	  $selQry="select * from tbl_team where team_id='".$_SESSION['tid']."'";  
	  $sel=mysql_query($selQry,$conn)or die(mysql_error());
	  $row=mysql_fetch_array($sel)or die(mysql_error());


if(isset($_POST['btnSubmit']))
{
	$contact=$_POST['txtContact'];
	$email=$_POST['txtEmail'];


  $upQry="update tbl_team set team_contact='".$contact."',team_email='".$email."' where team_id='".$_SESSION['tid']."'";
  echo $upQry;
  mysql_query($upQry);
  header("Location:ShowProfile.php");
		 
		 
	  }
	 include("Head.php");
	 
	  ?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EditProfile</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="1"> 
  <tr>
      <td>Email</td>
      <td><label for="txtEmail"></label>
      <input type="text" required="required" pattern"{3,36}" name="txtEmail" id="txtEmail" value="<?php echo $row['team_email'];?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtContact"></label>
      <input type="text" required="required" pattern"{3,36}" name="txtContact" id="txtContact" value="<?php echo $row['team_contact'];?>"/></td>
    </tr>
  
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</div>
</body>
<br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>