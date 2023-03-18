<!DOCTYPE html>
<html lang="en">
<?php
include("../Connection/Connection.php");
	
if(isset($_POST["btnRegister"]))
{
if($_POST["passwordTowner"]==$_POST["passwordConfirm"]){
		
	
	
$ins="insert into tbl_towner(towner_name,place_id,towner_email,towner_contact,towner_address,towner_uname,towner_password)values('".$_POST["txtTownername"]."','".$_POST["selplace"]."','".$_POST["txtEmail"]."','".$_POST["txtContact"]."','".$_POST["txtAddress"]."','".$_POST["txtUname"]."','".$_POST["passwordTowner"]."')";
	if(mysql_query($ins))
	{
		
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
    <title>Apply for job by Colorlib</title>

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
                    <h2 class="title">Manager Registration</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Name</div>
                            <div class="value">
                                <input required="required" pattern"[A-Za-z]{3,36}" class="input--style-6" type="text" name="txtTownername">
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">District</div>
                            <div class="value">
                                <div class="input-group">
                                    <select required="required" pattern"[A-Za-z]{3,36}" name="slctDistrict" class="input--style-6" style="width:100%;height:40px" id="slctDistrict" onchange="show_dis(this.value,0)">
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
                                    <select required="required" pattern"[A-Za-z]{3,36}" name="selplace"  style="width:100%;height:40px" class="input--style-6" id="selplace">
                                      <option>---select---</option>
                                      </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input required="required" class="input--style-6" type="email" name="txtEmail" placeholder="example@email.com">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Contact</div>
                            <div class="value">
                                <input required="required" pattern"[0-9]{10,10}" class="input--style-6" type="text" name="txtContact">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <textarea required="required" pattern"[A-Za-z]{3,36}" class="input--style-6" name="txtAddress"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <input required="required"  class="input--style-6" type="password" name="passwordTowner">
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="name">User Name</div>
                            <div class="value">
                                <input required="required" pattern"[A-Za-z]{3,36}" class="input--style-6" type="text" name="txtUname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <input required="required"  class="input--style-6" type="password" name="passwordConfirm">
                            </div>
                        </div>
                        
                        <div class="card-footer">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name="btnRegister">Send Application</button>
                    <a href="HomePage.php" class="btn btn--radius-2 btn--blue-2">Home	</a>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
<script src="../Ajax/Jq/jquery.js"></script>
<script>
 function open_file(){
      document.getElementById('file').click();
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