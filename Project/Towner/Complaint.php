<?php
include("../Connection/Connection.php");
	session_start();
	if(isset($_POST["btnSave"]))
	{
		
		$ins="insert into tbl_complaint(complainttype_id,complaint_date,complaint_details,team_id)values('".$_POST["slctComplainttype"]."',curdate(),'".$_POST["txtComplaintdetails"]."','".$_SESSION["toid"]."')";
		mysql_query($ins,$conn);
		echo'<script> alert("Data saved!")</script>';
	}
	 if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_complaint where complaint_id='".$_GET["delid"]."'";
			 mysql_query($del,$conn);
		 }
		 include("Links.php");
		 include("Head.php");
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Complainttype Name</td>
      <td><label for="slctComplainttype"></label>
        <select name="slctComplainttype" id="slctComplainttype">
        <option>----------Select---------</option>
        <?php
		$sel="select * from tbl_complainttype";
		$datas=mysql_query($sel,$conn);
		while($row=mysql_fetch_array($datas))
		{
			?>
        <option value="<?php echo $row["complainttype_id"];?>">
		<?php echo $row["complainttype_name"];?>
        </option>
        <?php
		}
		?>
      </select></td>
    </tr>
    
    <tr>
      <td>Complaint Details</td>
      <td><label for="txtComplaintdetails"></label>
      <textarea name="txtComplaintdetails" id="txtComplaintdetails" cols="45" rows="5"></textarea></td>
    </tr>
    
    
    <tr>
      <td colspan="2"><div align="center"><input type="submit" name="btnSave" id="btnSave" value="Save" />        <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></div></td>
    </tr>
  </table>
 <a href="Homepage.php">Home</a>
  </div>
</form>


<br /><br /><br />
<table border="1" cellpadding="7" align="center">
<tr>
<th>Slno:</th>
<th>Complainttype Name</th>
<th>Complaint Date</th>
<th>Complaint Details</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php
$i=0;
$sel="select * from tbl_complaint c  inner join tbl_complainttype ct on c.complainttype_id=ct.complainttype_id";
$datas=mysql_query($sel,$conn);
while($row=mysql_fetch_array($datas))
{
?>
<tr>
<td><?php echo $i=$i+1 ?></td>
<td><?php echo $row["complainttype_name"]?></td>
<td><?php echo $row["complaint_date"]?></td>
<td><?php echo $row["complaint_details"]?></td>
<td><?php if($row["status"]==0)
{
	echo"pending";
}
    else
{
	echo $row["reply"];
}
?>
</td>

<td><a href="Complaintt.php?delid=<?php echo $row["complaint_id"];?>">Delete</a>

</td>
</tr>
<?php
}
?>
</table>
</table>
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