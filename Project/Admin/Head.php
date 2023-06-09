<?php
include('../Connection/Connection.php');

session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>

        <!-- <link rel="icon" href="../Template/Admin/img/favicon.png" type="image/png"> -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../Template/Admin/css/bootstrap.min.css" />
        <!-- themefy CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/themefy_icon/themify-icons.css" />
        <!-- swiper slider CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/swiper_slider/css/swiper.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/select2/css/select2.min.css" />
        <!-- select2 CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/niceselect/css/nice-select.css" />
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/owl_carousel/css/owl.carousel.css" />
        <!-- gijgo css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/gijgo/gijgo.min.css" />
        <!-- font awesome CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/font_awesome/css/all.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/tagsinput/tagsinput.css" />
        <!-- datatable CSS -->
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/responsive.dataTables.min.css" />
        <link rel="stylesheet" href="../Template/Admin/vendors/datatable/css/buttons.dataTables.min.css" />
        <!-- text editor css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/text_editor/summernote-bs4.css" />
        <!-- morris css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/morris/morris.css">
        <!-- metarial icon css -->
        <link rel="stylesheet" href="../Template/Admin/vendors/material_icon/material-icons.css" />

        <!-- menu css  -->
        <link rel="stylesheet" href="../Template/Admin/css/metisMenu.css">
        <!-- style CSS -->
        <link rel="stylesheet" href="../Template/Admin/css/style.css" />
        <link rel="stylesheet" href="../Template/Admin/css/colors/default.css" id="colorSkinCSS">
    </head>
    <body class="crm_body_bg">



        <!-- main content part here -->

        <!-- sidebar  -->
        <!-- sidebar part here -->
        <nav class="sidebar">
            <div class="logo d-flex justify-content-between">
                <a href="HomePage.php"><h2 align="center">Welcome<br>Admin<br><?php echo $_SESSION["adminname"]?></h2></a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
            </div>
            <ul id="sidebar_menu">
                <li class="side_menu_title">
                    <span>Dashboard</span>
                </li>
                <li class="mm-active">
                    <a  href="HomePage.php"  aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/1.svg" alt="">
                        <span>Dashboard</span>
                    </a>
                   
                </li>
                <li class="side_menu_title">
                    <span>Applications</span>
                </li>
                <li class="">
                    <a   class="has-arrow" href="District.php" aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>District	</span>
                    </a>
				  </li>
                  <li class="">
                    <a   class="has-arrow" href="Place.php" aria-expanded="false">
                        <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                        <span>Place</span>
                    </a>
				  </li>
                  <li class="">
                        <a   class="has-arrow" href="complainttype.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>complainttype</span>
                        </a>	
                   </li>
           
              
                    <li class="">
                        <a   class="has-arrow" href="Feedback.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Feedback</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="Towner.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Towner</span>
                        </a>	
                   </li>
                    <li class="">
                        <a   class="has-arrow" href="TeamDetails.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>TeamDetails</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="TownerDetails.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>TownerDetails</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="TurfTime.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>TurfTime</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="ViewComplaint.php" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>ViewComplaint</span>
                        </a>	
                   </li>
                   <li class="">
                        <a   class="has-arrow" href="../" aria-expanded="false">
                            <img src="../Template/Admin/img/menu-icon/2.svg" alt="">
                            <span>Logout</span>
                        </a>	
                   </li>
                   
                 </ul>	    

        </nav>
        <!-- sidebar part end -->
        <!--/ sidebar  -->