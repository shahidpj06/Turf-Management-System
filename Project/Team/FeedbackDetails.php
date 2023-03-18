<?php
include("../Connection/Connection.php");
	session_start();
	if(isset($_POST["btnSave"]))
	{
		
		$ins="insert into tbl_feedback(feedback_details,feedback_date,team_id)values('".$_POST["txtFeedback"]."',curdate(),'".$_SESSION["tid"]."')";
		mysql_query($ins,$conn);
		echo'<script> alert("Data saved!")</script>';
	}
	 if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_feedback where feedback_id='".$_GET["delid"]."'";
			 mysql_query($del,$conn);
		 }
		 include("Links.php");
		 include("Head.php");
?>



















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Feedback</td>
      <td><label for="txtFeedback"></label>
      <textarea name="txtFeedback" required="required" id="txtFeedback" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btnSave" id="btnSave" value="Save" /></td></td>
    </tr>
  </table>
</form>
&nbsp;&nbsp;&nbsp;&nbsp;
<table align="center" border="1" cellpadding="3">
<tr>
<th>Slno:</th>
<th>Feedback</th>
<th>Date</th>
<th>Team Name</th>
<th>Action</th>
</tr>
<?php
$i=0;
$sel="select * from tbl_feedback p  inner join tbl_team d on p.team_id=d.team_id";
$datas=mysql_query($sel,$conn);
while($row=mysql_fetch_array($datas))
{
?>
<tr>
<td><?php echo $i=$i+1 ?></td>
<td><?php echo $row["feedback_details"]?></td>
<td><?php echo $row["feedback_date"]?></td>
<td><?php echo $row["team_name"]?></td>
<td colspan="2">
<a href="FeedbackDetails.php?delid=<?php echo $row["feedback_id"];?>">Delete</a>

</td>
</tr>
<?php
}
?>
</body>
<br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>