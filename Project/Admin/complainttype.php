<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
<?php
ob_start();
include('../Connection/Connection.php');
include('Head.php');


	if(isset($_POST['btn_save']))
	{
		$complainttype = $_POST['txt_complainttype'];
		
		if($_POST['txt_id'])
		{
			
			$up = "update tbl_complainttype  set complainttype_name = '".$complainttype."' where complainttype_id  = '".$_POST['txt_id']."'";
		
			if(mysql_query($up))	
			{
				header("Location:complainttype.php");
			}
		}
		else
		{
			$ins = "insert into tbl_complainttype  (complainttype_name) values('".$complainttype."')";
		
			if(mysql_query($ins))
			{
				header("Location:complainttype.php");
			}
		}
		
		
		
	}
	
	if($_GET['id'])
	{
		$del = "delete from tbl_complainttype  where complainttype_id = '".$_GET['id']."'";
		if(mysql_query($del))
		{
			header("Location:complainttype.php");
		}
	}
	
	if($_GET['eid'])
	{
		$did = $_GET['eid'];
		$dname = $_GET['ename'];
	}


?>
<body>
        <section class="main_content dashboard_part">

            <!--/ menu  -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="QA_section">
                                <!--Form-->
                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Table complainttype</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_complainttype">complainttype Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_complainttype" name="txt_complainttype" value="<?php echo $dname;?>">
                                                    <input type="hidden" name="txt_id" value="<?php echo $did;?>">
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">complainttype</td>
                                                <td align="center" scope="col">Action</td>
                                                 <td align="center" scope="col">Accept</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_complainttype ";
                                                $rs = mysql_query($selQry);
                                                while ($data = mysql_fetch_array($rs)) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["complainttype_name"];?></td>
                                                <td align="center"><a href="complainttype.php?id=<?php echo $data["complainttype_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                 <a href="complainttype.php?eid=<?php echo $data["complainttype_id"];?>&ename=<?php echo $data["complainttype_name"];?>" class="status_btn">Edit</a></td>
                                                    
                                                 <td align="center"><a href="accept.php?id=<?php echo $data["complainttype_id"];?>" class="status_btn">accept</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                
                                                   
                                                    
                                            </tr>
                                            <?php                    
                                              }


                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <?php
		include('Foot.php');
		 ob_end_flush();
		?>
</body>
</html>