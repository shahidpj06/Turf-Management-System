<?php
include("../Connection/Connection.php");
	session_start();
	if(isset($_POST["btnSave"]))
	{
		$tgallery=$_FILES["fileGallery"]["name"];
		$path=$_FILES["fileGallery"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Images/".$tgallery);

		$ins="insert into tbl_teamgallery(team_id,tgallery_img)values('".$_SESSION["tid"]."','".$tgallery."')";
		mysql_query($ins,$conn);
		echo'<script> alert("Data saved!")</script>';
	}
	 if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_teamgallery where tgallery_id='".$_GET["delid"]."'";
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
<title>Gallery</title>
</head>

<body>
<div id="tab" align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div align="center">
  <table width="200" border="1">
   
    <tr>
      <td>Gallery</td>
      <td><label for="fileGallery"></label>
      <input type="file" required="required" name="fileGallery" id="fileGallery"  required="required"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><input type="submit" name="btnSave" id="btnSave" value="Save" />        <input type="submit" name="btnCancel" id="btnCancel" value="Cancel" /></div></td>
    </tr>
  </table>
  </div>
</form>



<br/><br/><br/>
<table border="1" cellpadding="4" align="center">
<tr>
<th>Slno:</th>
<th>Team</th>
<th>Gallery</th>
<th>Action</th>
</tr>
<?php
$i=0;
$sel="select * from tbl_teamgallery tg  inner join tbl_team t on tg.team_id=t.team_id where t.team_id='".$_SESSION["tid"]."'";
$datas=mysql_query($sel,$conn);
while($row=mysql_fetch_array($datas))
{
?>
<tr>
<td><?php echo $i=$i+1 ?></td>
<td><?php echo $row["team_name"]?></td>
<td><img src="../Assets/Images/<?php echo $row["tgallery_img"]?>"  width="120" height="120"/></td>
<td><a href="Gallery.php?delid=<?php echo $row["tgallery_id"];?>">Delete</a>

</td>
</tr>
<?php
}
?>
</table>

</body>
<br />
<br /><br />
<br /><br />
<br />
<?php
include("Foot.php");
?>
</html>