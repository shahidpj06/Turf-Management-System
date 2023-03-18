<?php
include("../Connection/Connection.php");
	session_start();
	  $selQry="select * from tbl_towner where towner_id='".$_SESSION['toid']."'";
	  $sel=mysql_query($selQry,$conn)or die(mysql_error());
	  $row=mysql_fetch_array($sel)or die(mysql_error());


if(isset($_POST['btnSubmit']))
{
	$contact=$_POST['txtContact'];
	$email=$POST['txtEmail'];


  $upQry="update tbl_towner set towner_email='".$email."',towner_contact='".$contact."' where towner_id='".$_SESSION['toid']."'";
  //echo $insQuery;
		  mysql_query($upQry,$conn)or die(mysql_error());
		
		  echo"<b>Updated Completed Successfully!";
		 
	  }
	  include("Links.php");
	  include("Head.php");
	  ?>

















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editprofile</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Contact</td>
      <td><label for="txtContact"></label>
      <input type="text" required="required" name="txtContact" id="txtContact" value="<?php echo $row['towner_contact'];?>"/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtEmail"></label>
      <input type="text" required="required" name="txtEmail" id="txtEmail" value="<?php echo $row['towner_email'];?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<br />
<br /><br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>