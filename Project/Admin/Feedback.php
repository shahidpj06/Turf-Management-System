<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>


<?php

include("../Connection/Connection.php");
include('Head.php');


         if(isset($_POST["btnSave"]))
		 {
			 if(isset($_GET["eid"]))
			 {
				 $up="update tbl_feedback set feedback_details='".$_POST["txtFeedback"]."'where feedback_id='".$_GET["eid"]."'";
				 mysql_query($up,$conn);
				 header("location:Feedback.php");
			 }
			 
			 else
			 {
				 $Feedback=$_POST["txtFeedback"];
				 $ins="insert into tbl_feedback(feedback_details)values('".$Feedback."')";
				 mysql_query($ins,$conn);
				// echo $feedback;
				 echo'<script>alert("Data saved!")</script>';				 header("location:Feedback.php");

			 }
		 }
		   if(isset($_GET["delid"]))
		 {
			 echo ($_GET["delid"]);
			 $del="delete from tbl_feedback where feedback_id='".$_GET["delid"]."'";
			 mysql_query($del,$conn);
		 }
		 if(isset($_GET["eid"]))
		 {
			 $sel="select*from tbl_feedback where feedback_id='".$_GET["eid"]."'";
			 $datas=mysql_query($sel);
			 $row=mysql_fetch_array($datas);
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
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Feedback Details</td>
                                                <td align="center" scope="col">Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $i = 0;
                                                $selQry = "select * from tbl_feedback ";
                                                $rs = mysql_query($selQry);
                                                while ($data = mysql_fetch_array($rs)) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i;?></td>
                                                <td align="center"><?php echo $data["feedback_details"];?></td>
                                                <td align="center"><?php echo $data["feedback_date"];?></td>
                                                
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