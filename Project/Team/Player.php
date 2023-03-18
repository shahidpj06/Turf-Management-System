<?php
include("../Connection/Connection.php");
	session_start();
	if(isset($_POST["btnSave"]))
	{
		
		$photo=$_FILES["filePhoto"]["name"];
	$path=$_FILES["filePhoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Images/".$photo);
	
	$aproof=$_FILES["fileAgeproof"]["name"];
	$path=$_FILES["fileAgeproof"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Images/".$aproof);
	
	$qproof=$_FILES["fileQproof"]["name"];
	$path=$_FILES["fileQproof"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Images/".$qproof);
	
	
	
	
	
	
	
	
$ins="insert into tbl_players(player_name,team_id,age_proof,player_email,player_contact,player_address,place_id,player_pic,player_qualification,player_qproof)values('".$_POST["txtPlayername"]."','".$_SESSION["tid"]."','".$aproof."','".$_POST["txtEmail"]."','".$_POST["txtContact"]."','".$_POST["txtAddress"]."','".$_POST["selplace"]."','".$photo."','".$_POST["txtQualifiacation"]."','".$qproof."')";
	mysql_query($ins);
	echo '<script> alert("Data saved!")</script>';
	}
	if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_players where player_id='".$_GET["delid"]."'";
			 mysql_query($del,$conn);
			 echo'<script> alert("Data Deleted!")</script>';
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
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div align="center" id="tab">
<h1>Players</h1>
  <table>
    <tr>
      <td>Player Name</td>
      <td><label for="txtPlayername"></label>
      <input type="text" required="required" pattern"[A-Za-z]{3,36}" name="txtPlayername" id="txtPlayername" /></td>
    </tr>
    <tr>
      <td>Age Proof</td>
      <td><label for="fileAgeproof"></label>
      <input type="file" required="required" name="fileAgeproof" id="fileAgeproof" /></td>
    </tr>
   
    <tr>
      <td>Email</td>
      <td><label for="txtEmail"></label>
      <input type="text"required="required" pattern"{3,36}" name="txtEmail" id="txtEmail" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txtContact"></label>
      <input type="text" required="required" pattern"[0-9]{10,10}" name="txtContact" id="txtContact" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtAddress"></label>
      <textarea name="txtAddress" required="required" pattern"[A-Za-z]{3,36}" id="txtAddress" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="filePhoto"></label>
      <input type="file" required="required" name="filePhoto" id="filePhoto" /></td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="slctDistrict" required="required" pattern"[A-Za-z]{3,36}" id="slctDistrict" onchange="show_dis(this.value,0)">
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
        <select name="selplace" required="required" pattern"[A-Za-z]{3,36}" id="selplace">
      </select></td>
    </tr>
    <tr>
      <td>Player Qualification</td>
      <td>
        <p>
          <textarea name="txtQualifiacation" required="required" id="txtQualifiacation" cols="45" rows="5"></textarea>
      </p></td>
    </tr>
    <tr>
      <td>Qualification Proof</td>
      <td><label for="fileQproof"></label>
      <input type="file" name="fileQproof" required="required" id="fileQproof" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><input type="submit" name="btnSave" id="btnSave" value="Save" /></td>
    </tr>
  </table>

</form>


<br /><br /><br />
<table border="1" align="center">
<tr>
<th>Slno:</th>
<th>Player Name</th>
<th>Team</th>
<th>Age Proof</th>
<th>Contact</th>
<th>Email</th>
<th>Address</th>
<th>Player Photo</th>
<th>Player Qualification</th>
<th>Player Qualification Proof</th>
<th>Action</th>
</tr>
<?php
$i=0;
$sel="select * from tbl_players pl  inner join tbl_team t on pl.team_id=t.team_id";
$datas=mysql_query($sel,$conn);
while($row=mysql_fetch_array($datas))
{
?>
<tr>
<td><?php echo $i=$i+1 ?></td>
<td><?php echo $row["player_name"]?></td>
<td><?php echo $row["team_name"]?></td>
<td><?php echo $row["age_proof"]?></td>
<td><?php echo $row["player_contact"]?></td>
<td><?php echo $row["player_email"]?></td>
<td><?php echo $row["player_address"]?></td>
<td><img src="../Assets/Images/<?php echo $row["player_pic"]?>"  width="120" height="120"/></td>
<td><?php echo $row["player_qualification"]?></td>
<td><?php echo $row["player_qproof"]?></td>


<td><a href="Player.php?delid=<?php echo $row["player_id"];?>">Delete</a>
</td>
</tr>
<?php
}
?>
</table>
  </div>
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