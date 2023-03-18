
<?php

include("../Connection/Connection.php");


         if(isset($_POST["btnSave"]))
		 {
			 if(isset($_GET["eid"]))
			 {
				 $up="update tbl_tournamenttype set tournamenttype_name='".$_POST["txtTournamenttype"]."'where tournamenttype_id='".$_GET["eid"]."'";
				 mysql_query($up,$conn);
			 }
			 
			 else
			 {
				 $Ttype=$_POST["txtTtype"];
				 $ins="insert into tbl_tournamenttype(tournamenttype_name)values('".$Ttype."')";
				 mysql_query($ins,$conn);
				// echo $Ttype;
				 echo'<script>alert("Data saved!")</script>';
			 }
		 }
		  if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_tournamenttype where tournamenttype_id='".$_GET["delid"]."'";
			 mysql_query($del,$conn);
		 }
		 if(isset($_GET["eid"]))
		 {
			 $sel="select*from tbl_tournamenttype where tournamenttype_id='".$_GET["eid"]."'";
			 $datas=mysql_query($sel);
			 $row=mysql_fetch_array($datas);
		 }
		 ?>













<html>
<head>
<title>Unitted Document</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<div align="center">
  <table width="200" border="1">
    <tr>
      <td>Tournament type name</td>
      <td><label for="txtTtype"></label>
      <input type="text" name="txtTtype" id="txtTtype"value="<?php echo $row["tournamenttype_name"]?>" required autocomplete="off"></td>
    </tr>
    <tr>
      <td colspan="3"><div align="center">
      <input type="submit" name="btnSave" id="btnSave" value="Save"/>
      <input type="submit" name="btnCancel" id="btnCancel" value="Cancel"/>
      </div></td>
    </tr>
  </table>
   <a href="Homepage.php">Home Page</a>
  </div>
</form><br /><br /><br />
<table border="1" cellpadding="3" align="center">
<tr>
<th>Slno:</th>
<th>Tournamenttype</th>
<th>Action</th>
</tr>
<?php
$i=0;
$sel="select*from tbl_tournamenttype";
$datas=mysql_query($sel,$conn);
while($row=mysql_fetch_array($datas))
{
?>
<tr>
<td><?php echo $i=$i+1 ?></td>
<td><?php echo $row["tournamenttype_name"]?></td>
<td colspan="2">
<a href="Tournamenttype.php?delid=<?php echo $row["tournamenttype_id"];?>">Delete</a>
<a href="Tournamenttype.php?eid=<?php echo $row["tournamenttype_id"];?>">Edit</a>
</td>
</tr>
<?php
}
?>
</table>
</body>
</html>

    

