



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TurfDetails</title>
</head>
<?php
session_start();
include('../Connection/Connection.php');
?>

<?php

		 include("Head.php");
	?>
<body>
<div id="tab" align="center">
<form id="form1" name="form1" method="post" action="">
  <table >
      <tr>
      <td>District</td>
      <td><select name="slctDistrict" required="required" id="slctDistrict" onchange="show_dis(this.value,0)">
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
        <select name="selplace" required="required"  id="selplace">
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
	  

$sel="select * from tbl_turf t inner join tbl_place p on p.place_id=t.place_id where p.place_id='".$_POST["selplace"]."'";

$datas=mysql_query($sel,$conn);
$count=mysql_num_rows($datas);
if($count>0)
{?>
  <table>
<tr>
<th>Slno:</th>
<th>Name</th>
<th>Photo</th>
<th>Details</th>
<th>Place</th>
<th>Location</th>
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
<td><?php echo $row["turf_name"]?></td>
<td><img src="../Assets/TurfImage/<?php echo $row["turf_image"]?>" width="120" height="120" /></td>
<td><?php echo $row["turf_details"]?></td>
<td><?php echo $row["place_name"]?></td>
<td><?php echo $row["turf_location"]?></td>

<td colspan="1">
<a href="TurfBook.php?id=<?php echo $row["turf_id"];?>">Book</a>

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
</div>
</body>
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

<?php
include("Foot.php");
?>