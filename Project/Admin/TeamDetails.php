<?php
ob_start();
include("../Connection/Connection.php");
include('Head.php');
if(isset($_GET["acid"]))
{
	$upAccept="update tbl_team set team_status=1 where team_id='".$_GET["acid"]."'";
	mysql_query($upAccept);
	header("loaction:TeamDetails.php");
}

if(isset($_GET["reid"]))
{
	$upReject="update tbl_team set team_status=2 where team_id='".$_GET["reid"]."'";
	mysql_query($upReject);
	header("loaction:TeamDetails.php");
}
?>











<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>
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
                                    <h1 align="center">New List</h1>
                                    <table class="table lms_table_active">
                                    <thead>
                                       <tr style="background-color: #74CBF9">
                                            <td align="center">Slno:</td>
                                            <td align="center">Name</td>
                                            <td align="center">Contact</td>
                                            <td align="center">Email</td>
                                            <td align="center">Action</td>
                                        </tr>
                                     </thead>
                                     <tbody>
                                            <?php
                                            
                                            $i=0;
                                            $sel="select * from tbl_team where team_status=0";
                                            $datas=mysql_query($sel,$conn);
                                            while($row=mysql_fetch_array($datas))
                                            {
                                            ?>
                                            <tr>
                                            <td align="center"><?php echo $i=$i+1 ?></td>
                                            <td align="center"><?php echo $row["team_name"]?></td>
                                            <td align="center"><?php echo $row["team_contact"]?></td>
                                            <td align="center"><?php echo $row["team_email"]?></td>
                                            
                                            
                                            <td colspan="2" align="center">
                                            <a href="TeamDetails.php?acid=<?php echo $row["team_id"];?>" class="status_btn">Accept</a>
                                            <a href="TeamDetails.php?reid=<?php echo $row["team_id"];?>" class="status_btn">Reject</a>
                                            </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                    </table>
                                </div>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <h1 align="center">Accepted List</h1>
                                    <table class="table lms_table_active">
                                    <thead>
                                       <tr style="background-color: #74CBF9">
                                            <td align="center">Slno:</td>
                                            <td align="center">Name</td>
                                            <td align="center">Contact</td>
                                            <td align="center">Email</td>
                                            <td align="center">Action</td>
                                        </tr>
                                     </thead>
                                     <tbody>
                                            <?php
                                            
                                            $i=0;
                                            $sel="select * from tbl_team where team_status=1";
                                            $datas=mysql_query($sel,$conn);
                                            while($row=mysql_fetch_array($datas))
                                            {
                                            ?>
                                            <tr>
                                            <td align="center"><?php echo $i=$i+1 ?></td>
                                            <td align="center"><?php echo $row["team_name"]?></td>
                                            <td align="center"><?php echo $row["team_contact"]?></td>
                                            <td align="center"><?php echo $row["team_email"]?></td>
                                            
                                            
                                            <td colspan="2" align="center">
                                            <a href="TeamDetails.php?reid=<?php echo $row["team_id"];?>" class="status_btn">Reject</a>
                                            </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            </tbody>
                                    </table>
                                </div>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <h1 align="center">Rejected List</h1>
                                    <table class="table lms_table_active">
                                    <thead>
                                       <tr style="background-color: #74CBF9">
                                            <td align="center">Slno:</td>
                                            <td align="center">Name</td>
                                            <td align="center">Contact</td>
                                            <td align="center">Email</td>
                                            <td align="center">Action</td>
                                        </tr>
                                     </thead>
                                     <tbody>
                                            <?php
                                            
                                            $i=0;
                                            $sel="select * from tbl_team where team_status=2";
                                            $datas=mysql_query($sel,$conn);
                                            while($row=mysql_fetch_array($datas))
                                            {
                                            ?>
                                            <tr>
                                            <td align="center"><?php echo $i=$i+1 ?></td>
                                            <td align="center"><?php echo $row["team_name"]?></td>
                                            <td align="center"><?php echo $row["team_contact"]?></td>
                                            <td align="center"><?php echo $row["team_email"]?></td>
                                            
                                            
                                            <td colspan="2" align="center">
                                            <a href="TeamDetails.php?acid=<?php echo $row["team_id"];?>" class="status_btn">Accept</a>
                                            
                                            </td>
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




