<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRO SOCCER</title>
</head>

<body>
</body>
</html>
<?php
include("../Connection/Connection.php");
	session_start();
	  

if(isset($_POST['btnSubmit']))
{
	$id=$_SESSION['toid'];
	$details=$_POST['txt_details'];
	$place=$_POST['selplace'];
	$location=$_POST['txt_loc'];
	
	
	$image=$_FILES['file_image']["name"];
	$temp=$_FILES['file_image']["tmp_name"];
	move_uploaded_file($temp,"../Assets/Turfimage/".$image);
	
	
	$name=$_POST['txt_name'];


  $upQry="insert tbl_turf (towner_id,turf_details,place_id,turf_location,turf_image,turf_name)
  values('".$id."','".$details."','".$place."','".$location."','".$image."','".$name."')";
		 if( mysql_query($upQry))
		 {
		
		  echo"<script>alert('Insert Completed Successfully!')</script>";
		 }
		 
	  }
	  include("Links.php");
	  include("Head.php");
	  ?>

















<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add New Turf</title>
</head>

<body>
<div id="tab" align="center">
<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" required="required" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txt_name"></label>
      <textarea name="txt_details"></textarea>
      </td>
    </tr>
    <tr>
      <td>Image</td>
      <td><label for="txt_name"></label>
      <input type="file" required="required" name="file_image" id="file_image" />
      </td>
    </tr>
    <tr>
    	<td>District</td>
        <td>
         <select name="slctDistrict" required="required" onchange="show_dis(this.value,0)">
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
                                      </select>
        </td>
    </tr>
    <tr>
    <td>
    Place
    </td>
    <td>
    <select name="selplace" id="selplace" required="required" >
                                      <option>---select---</option>
                                      </select>
    </td>
    </tr>
    <tr>
    	<td>Location</td>
        <td> <input type="text" required="required" name="txt_loc" id="txt_loc" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
<script src="../Ajax/Jq/jquery.js"></script>
<script>
function show_dis(did)
{
	$.ajax({
	url: "../Ajax/ajaxdis.php?did="+did,
	  cache: false,
	  success: function(html){
		$("#selplace").html(html);
	  }
	});
}
</script>

<br />
<br /><br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>