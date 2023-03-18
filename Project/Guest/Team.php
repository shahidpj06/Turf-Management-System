<!DOCTYPE html>
<html lang="en">
<?php
include("../Connection/Connection.php");
	

if(isset($_POST["btnRegister"]))
{
if($_POST["passwordTeam"]==$_POST["passwordConfirm"])
{
		
		$proof=$_FILES["fileph"]["name"];
	$path=$_FILES["fileph"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Images/".$proof);
	
$ins="insert into tbl_team(team_name,team_contact,team_email,place_id,team_photo,team_username,team_password)values('".$_POST["txtTeamname"]."','".$_POST["txtTeamcontact"]."','".$_POST["txtTeamemail"]."','".$_POST["selplace"]."','".$proof."','".$_POST["txtUsername"]."','".$_POST["passwordTeam"]."')";
	if(mysql_query($ins))
	{
		
	header("Location:../index.php");
		}
		else
		{
			echo $ins;
		}
}
else
{
	echo "<script>alert('Password Mismatched')</script>";
}
	//echo $ins;	
	
}	

?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Team</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="../Template/Signup/css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Team Registration</h2>
                </div>
                <div class="card-body">
                    <form action="" autocomplete="off" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <div class="form-row">
                            <div class="name">Team name</div>
                            <div class="value">
                                <input class="input--style-6" required="required" pattern"{3,36}" type="text" name="txtTeamname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Contact</div>
                            <div class="value">
                                <input class="input--style-6" required="required" pattern"{3,36}" type="text" name="txtTeamcontact">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" required="required" pattern"{3,36}" type="email" name="txtTeamemail" placeholder="example@email.com">
                                </div>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">District</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="slctDistrict" required="required" pattern"{3,36}" class="input--style-6" style="width:100%;height:40px" id="slctDistrict" onchange="show_dis(this.value,0)">
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
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Place</div>
                            <div class="value">
                                <div class="input-group">
                                    <select name="selplace" required="required" pattern"{3,36}" style="width:100%;height:40px" class="input--style-6" id="selplace">
                                      <option>---select---</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Photo</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" required="required" type="file" name="fileph" id="fileph">
                                    <label class="label--file" for="file" onclick="open_file()">Choose file</label>
                                    <span class="input-file__info">No file chosen</span>
                                </div>
                                <div class="label--desc">Upload your Photo. Max file size 2 MB</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Username</div>
                            <div class="value">
                                <input class="input--style-6" required="required" pattern"{3,36}" type="text" name="txtUsername">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <input class="input--style-6" required="required" pattern"{3,36}" type="password" name="passwordTeam">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <input class="input--style-6" required="required" pattern"{3,36}" type="password" name="passwordConfirm">
                            </div>
                        </div>
                        <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="btnRegister">Submit</button>
              	  </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<script src="../Ajax/Jq/jquery.js"></script>
<script>
 function open_file(){
      document.getElementById('fileph').click();
  }
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


    <!-- Jquery JS-->
    <script src="../Template/Signup/vendor/jquery/jquery.min.js"></script>


    <!-- Main JS-->
    <script src="../Template/Signup/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->