<?php
include_once("settings.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">



<?php include_once("links.php"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once("nav.php"); ?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include_once("aside.php");   ?>
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
  <?php  if(isset($_SESSION["admin_email"])){
                 echo "<span style='color:green'>welcome:</span>".$_SESSION['admin_email'] ;
              
                 }else{
   
                    if(session_destroy()) {
                        echo "<script>window.open('login.php','_self')</script>";
                    }
                 }
                 ?>
   <?php 
   if(!isset($_GET["Subcategories"])){
   if(!isset($_GET["add_books"])){
    if(!isset($_GET["view_books"])){
      if(!isset($_GET["view_orders"])){
        if(!isset($_GET["complete_orders"])){
          if(!isset($_GET["pending_orders"])){
            if(!isset($_GET["categories"])){
              if(!isset($_GET["customer_details"])){
                if(!isset($_GET["email_customers"])){
                  include_once("dasboard.php"); 
                }
              }
            }
          }
        }
      }
    }
  }
}   
  
  if(isset($_GET["add_books"])){
    include_once("Add_books.php"); 

    }
   

  if(isset($_GET["view_books"])){
    include_once("view_books.php"); 

  }
   

  if(isset($_GET["categories"])){
    include_once("categories.php");
  }
  
  if(isset($_GET["Subcategories"])){
    include_once("Subcategories.php");
  }

  if(isset($_GET["customer_details"])){
    include_once("customer_details.php");
  }
   ?>

  </div>
  <!-- /.content-wrapper -->
 <?php include_once("footer.php");   ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  

</body>
</html>
