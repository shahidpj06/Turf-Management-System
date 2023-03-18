<?php
include("../Connection/Connection.php");
	session_start();
 if(isset($_GET["delid"]))
		 {
			 $ins="insert into tbl_tbooking(team_id,t_id,booked_date)values('".$_SESSION["tid"]."','".$_GET["delid"]."',curdate())";
			 if(mysql_query($ins))
			 {
				 header("location:Payment.php");
			 }
			 else
			 {
				 echo $ins;
			 }
		 }
		 include("Links.php");
		 include("Head.php");
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
      <td>District</td>
      <td><select name="slctDistrict" id="slctDistrict" onchange="show_dis(this.value,0)">
        <option>---Select---</option>
        <?php
	  $sel="select * from tbl_district";
	  echo $sel;
	  $datas=mysql_query($sel);
	  while($rows=mysql_fetch_array($datas))
	  {
		  ?>
        <option value="<?php echo $rows["district_id"];?>"> <?php echo $rows["district_name"];?> </option>
        <?php
	  }
	  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="selplace"></label>
        <select name="selplace" id="selplace">
         <option>---Select---</option>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_save" id="btn_save" value="Search"  on/></td>
    </tr>
  </table>
  <hr />
  <br />
  <?php
  if(isset($_POST["btn_save"]))
  {
	  

$sel="select * from tbl_tornament t  inner join tbl_towner o on t.towner_id=o.towner_id inner join tbl_place p on p.place_id=o.place_id where p.plcae_id='".$_POST["selplace"]."'";
$datas=mysql_query($sel,$conn);
$count=mysql_num_rows($datas);
if($count>0)
{?>
  <table border="1" cellpadding="14" align="center" >
<tr>
<th>Slno:</th>
<th>Tournamenttype</th>
<th>Towner</th>
<th>Tournament Details</th>
<th>Start Date</th>
<th>End Date</th>
<th>Start Time</th>
<th>End Time</th>
<th>Location</th>
<th>Team Member Count</th>
<th>Tournament Registration Price</th>
<th>Action</th>
</tr>
<?php
$i=0;
while($row=mysql_fetch_array($datas))
{
	$i++;
?>
<tr>
<td><?php echo $i ?></td>
<td><?php echo $row["tournamenttype_name"]?></td>
<td><?php echo $row["towner_name"]?></td>
<td><?php echo $row["t_details"]?></td>
<td><?php echo $row["t_startdate"]?></td>
<td><?php echo $row["t_enddate"]?></td>
<td><?php echo $row["t_stime"]?></td>
<td><?php echo $row["t_etime"]?></td>
<td><?php echo $row["t_location"]?></td>
<td><?php echo $row["team_member_count"]?></td>
<td><?php echo $row["t_regprice"]?></td>

<td colspan="1">
<a href="SearchTournament.php?delid=<?php echo $row["t_id"];?>">Book</a>

</td>
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
  <?php
  }
  ?>
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
<script src="../Ajax/Jq/jquery.js"></script>
<script>
function show_dis(did)
{
	//alert(sid);
//alert(did);

	$.ajax({
	url: "../Ajax/ajaxdis.php?did="+did,
	 
//alert(mid);
	  cache: false,
	  success: function(html){
		$("#selplace").html(html);
		//alert(html);
	  }
	});
}
</script>