<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Complaint</title>
        <?php ob_start();?>
        <?php include("Head.php"); ?>
    </head>a

    <?php      if (isset($_POST["btn_save"])) {

            $upQry = "update tbl_complaint set complaint_reply='" . $_POST["txt_reply"] . "' where complaint_id='" .$_POST["hid"]. "'";
            mysql_query($upQry);
            header("Location:ViewComplaint.php");
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
                                <?php                                   if ($_GET["up"]) {
                                ?>

                                <div class="white_box_tittle list_header">
                                    <div class="col-lg-12">
                                        <div class="white_box mb_30">
                                            <div class="box_header ">
                                                <div class="main-title">
                                                    <h3 class="mb-0" >Send Reply</h3>
                                                </div>
                                            </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_district">Delete</label>
                                                    <input required type="text" class="form-control" id="txt_reply" name="txt_reply">
                                                    <input type="hidden" name="hid" value="<?php echo $_GET["up"] ; ?>">
                                                </div>
                                                 </div>
                                            <form method="post">
                                                <div class="form-group">
                                                    <label for="txt_district">Delete</label>
                                                    <input required type="text" class="form-control" id="txt_reply" name="txt_reply">
                                                    <input type="hidden" name="hid" value="<?php echo $_GET["up"] ; ?>">
                                                </div>
                                                <div class="form-group" align="center">
                                                    <input type="submit" class="btn-dark" style="width:100px; border-radius: 10px 5px " name="btn_save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                    }


                                ?>
                                <h1>New Complaints</h1>
                                <div class="QA_table mb_30">
                                    <!-- table-responsive -->
                                    <table class="table lms_table_active">
                                        <thead>
                                            <tr style="background-color: #74CBF9">
                                                <td align="center" scope="col">Sl.No</td>
                                                <td align="center" scope="col">Complaint</td>
                                                <td align="center" scope="col">Date</td>
                                                <td align="center" scope="col">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php                                                $i = 0;
                                                $selQry = "select * from tbl_complaint where complaint_reply = ''";
                                                $row = mysql_query($selQry);
                                                while ($data = mysql_fetch_array($row)) {

                                                    $i++;

                                            ?>
                                            <tr>
                                                <td align="center"><?php echo $i?></td>
                                                <td align="center"><?php echo $data["complaint_details"];?></td>
                                                <td align="center"><?php echo $data["complaint_date"]?></td>
                                                <td align="center"><a href="ViewComplaint.php?up=<?php echo $data["complaint_id"];?>" class="status_btn">Edit</a> </td>
                                            </tr>
                                            
                                            <?php                      }


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
    </body>
    <?php include("Foot.php"); ?>
    <?php ob_end_flush(); ?>
</html>
