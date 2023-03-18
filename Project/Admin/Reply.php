<?php
include("../Connection/Connection.php")
?>
<?php
         if(isset($_POST["btnSave"]))
		 {
				 $up="update tbl_complaint set complaint_reply='".$_POST["txtReply"]."'where complaint_id='".$_GET["cid"]."'";
				 mysql_query($up);
				 echo"<script>alert(Data Saved!)</script>";
			 }
			 ?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center" cellpadding="10" style="border-collapse:collapse">
    <tr>
      <td>Reply</td>
      <td><label for="txtReply"></label>
      <textarea name="txtReply" id="txtReply" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td><input type="submit" name="btnSave" id="btnSave" value="Send" /></td>
      <td><input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>