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
		$stafftype = $_POST['txt_stafftype'];
		
		if($_POST['txt_id'])
		{
			
			$up = "update tbl_stafftype set stafftype_name = '".$stafftype."' where stafftype_id  = '".$_POST['txt_id']."'";
		
			if(mysql_query($up))	
			{
				header("Location:stafftype.php");
			}
		}
		else
		{
			$ins = "insert into tbl_stafftype (stafftype_name) values('".$stafftype."')";
		
			if(mysql_query($ins))
			{
				header("Location:stafftype.php");
			}
		}
		
		
		
	}
	
	if($_GET['id'])
	{
		$del = "delete from tbl_stafftype where stafftype_id = '".$_GET['id']."'";
		if(mysql_query($del))
		{
			header("Location:stafftype.php");
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
                                                    <h3 class="mb-0" >Table stafftype</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_stafftype">stafftype Name</label>
                                                    <input required="" type="text" class="form-control" id="txt_stafftype" name="txt_stafftype" value="<?php echo $dname;?>">
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
                                                <td align="center" scope="col">stafftype</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_stafftype";
                                                $rs = mysql_query($selQry);
                                                while ($data = mysql_fetch_array($rs)) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["stafftype_name"];?></td>
                                                <td align="center"><a href="stafftype.php?id=<?php echo $data["stafftype_id"];?>" class="status_btn">Delete</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="stafftype.php?eid=<?php echo $data["stafftype_id"];?>&ename=<?php echo $data["stafftype_name"];?>" class="status_btn">Edit</a></td>
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