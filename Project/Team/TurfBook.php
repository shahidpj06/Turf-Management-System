
<?php
session_start();
include('../Connection/Connection.php');
include("Head.php");

	if(isset($_POST['btn_submit']))
	{
		$timeF= $_POST['sel_ftime'];
		$timeT = $_POST['sel_ttime'];
		$tid=$_SESSION["tid"];
		$date = $_POST["txt_date"];
		$type = $_POST["sel_type"];
		$id = $_POST["txt_id"];
		
		if($type=="5s")
		{
			$rate = 1000;
		}
		else if($type=="6s")
		{
			$rate = 1200;
		}
		else if($type=="7s")
		{
			$rate = 1400;
		}
		
		$time = $timeT - $timeF;
		
		$amount = $rate * $time;
	
	
			$selC = "SELECT * FROM tbl_turfbooking WHERE (turfbooking_date = '".$date."') and (turfbooking_ftime BETWEEN '".$timeF."' AND '".$timeT."') AND (turfbooking_ttime BETWEEN '".$timeF."' AND '".$timeT."') and turfbooking_status='1'";
			$rowC = mysql_query($selC);
			if(mysql_num_rows($rowC))
			{
				echo "<script>alert('Already Booked')</script>";
			}
			else
			{
				$ins = "insert into tbl_turfbooking(turf_id,booking_amount,booking_type,turfbooking_date,turfbooking_ftime,turfbooking_ttime,team_id) values('".$id."','".$amount."','".$type."','".$date."','".$timeF."','".$timeT."','".$tid."')";
		
					if(mysql_query($ins))
					{
						echo "<script>
								alert('Pay ".$amount." Now');
								window.location.href='TPayment.php';
								</script>";
					}		
		
			}
	}	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TurfBook</title>
</head>
 <?php
  include("Head.php");
 ?>
<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Date</td>
      <td>
      	<input type="date" name="txt_date" min="<?php echo date("d/m/Y"); ?>"/>
      <input type="hidden" name="txt_id" value="<?php echo $_GET["id"]; ?>"/>
      </td>
    </tr>
    <tr>
      <td>From Time</td>
      <td>
          <select name="sel_ftime" onchange="time(this.value)">
            <option value="">----Select Time----</option>
             <?php
                   $selQry = "select * from tbl_time";
                   $rs = mysql_query($selQry);
                   while ($data = mysql_fetch_array($rs)) {
			?>
            	
                <option value="<?php echo $data["time_value"];?>"><?php echo $data["time_hr"];?></option>
            
            <?php
				   }
			?>
          </select>
      </td>
    </tr>
    <tr>
      <td>To Time</td>
      <td>
          <select name="sel_ttime" id="sel_ttime">
            <option>----Select Time----</option>
            <?php
                   $sel = "select * from tbl_time ORDER BY time_value ASC";
                   $rsQ = mysql_query($sel);
                   while ($dataQ = mysql_fetch_array($rsQ)) {
			?>
            	
                <option value="<?php echo $dataQ["time_value"];?>"><?php echo $dataQ["time_hr"];?></option>
            
            <?php
				   }
			?>
          </select>
      </td>
      <tr>
      <td>Type</td>
      <td>
          <select name="sel_type" id="sel_type">
            <option value="">----Select----</option>
            <option value="5s">5s</option>
            <option value="6s">6s</option>
            <option value="7s">7s</option>
          </select>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit"  value="Submit"/></td>
    </tr>
  </table>
</form>
<?php
$sel="SELECT * FROM tbl_turfbooking tb inner join tbl_time tf on tb.turfbooking_ftime=tf.time_value inner join tbl_time tt on tt.time_value=tb.turfbooking_ttime where team_id='".$_SESSION["tid"]."' and turfbooking_status='1'";
$datas=mysql_query($sel,$conn);
$count=mysql_num_rows($datas);
if($count>0)
{?>
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
?>
</table>

</div>
<script src="../Ajax/Jq/jquery.js"></script>
<script>
function time(tid)
{

	$.ajax({
	url: "../Ajax/ajaxtime.php?tid="+tid,
	  success: function(result){
		$("#sel_ttime").html(result);
	  }
	});
}
</script>
</body>
<?php
  include("Foot.php");
 ?>

</html>