<?php

session_start();
include('../Connection/Connection.php');
include("Head.php");
$sel="SELECT * FROM tbl_turfbooking tb inner join tbl_turf t on t.turf_id=tb.turf_id where turfbooking_status='1' and tb.team_id='".$_SESSION["tid"]."'";
$datas=mysql_query($sel,$conn);
$count=mysql_num_rows($datas);
if($count>0)
{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ViewTurfBooking</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table border="1" cellpadding="14" align="center" >
<tr>
<th>Slno</th>
<th>type</th>
<th>Time</th>
<th>Date</th>
<th>Amount</th>
</tr>
<?php
$i=0;
while($row=mysql_fetch_array($datas))
{
	$i++;
	$selF = "select * from tbl_time where time_value='".$row["turfbooking_ftime"]."'";
	$rowF = mysql_query($selF);
	$dataF = mysql_fetch_array($rowF);
	$selT = "select * from tbl_time where time_value='".$row["turfbooking_ttime"]."'";
	$rowT = mysql_query($selT);
	$dataT = mysql_fetch_array($rowT);
?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $row["booking_type"]?></td>
<td><?php echo $dataF["time_hr"]?>-<?php echo $dataT["time_hr"]?></td>
<td><?php echo $row["turfbooking_date"]?></td>
<td><?php echo $row["booking_amount"]?></td>

</tr>
<?php
}
}
else
{
	echo "No Results Found";
}
?></table>
<br /><br /><br /><br />


</body>
</html><?php 
include("Foot.php");

?>