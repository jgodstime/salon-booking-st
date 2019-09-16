<?php
// A session is required
if (!session_id()) @session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    <?php 

echo $this->title; ?>
  </title>
  

  <noscript>
    <META http-equiv="refresh" content="0;URL=enableJavascript.php">
  </noscript>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8" />
  
  
  <script type="text/javascript" src="<?php echo URL; ?>repertory/bt_files/js/jquery-3.2.1.min.js"></script>
  
  <script src="<?php echo URL; ?>repertory/bt_files/js/bootstrap.js"></script>
  <link rel="stylesheet" href="<?php echo URL; ?>repertory/bt_files/css/dataTables.bootstrap.min.css">
  <link href="<?php echo URL; ?>repertory/bt_files/css/bootstrap.css" rel="stylesheet" type="text/css">
    
  <link href="<?php echo URL; ?>repertory/bt_files/css/mystylesheet.css" rel="stylesheet" type="text/css">


</head>

<body>



  <div class="navbar navbar-default navbar-static-top" style="margin-bottom:30px;">
    <nav class="navbar navbar-default navbar-fixed-top" style="">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL?>">
            Home
          </a>

        </div>
        <div style="height: 1px;" aria-expanded="false" id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav">
            <!-- <li class="active">
              <a data-toggle="tooltip" data-placement="bottom" title="Submit payment information" href="<?php echo URL?>paid">
                <span class="glyphicon glyphicon-credit-card"></span> Paid</a>
            </li> -->
          </ul>

          <ul class="nav navbar-nav navbar-right">
         
      <?php
        if(isset($_SESSION["adminId"])){
          ?>
           <li class=""> <a href="<?php echo URL?>admin/services"><span class=""></span> Add Room</a></li>
          <li class=""> <a href="<?php echo URL?>admin/customers"><span class=""></span> Customers</a></li>
          <li class=""> <a href="<?php echo URL?>admin/bookings"><span class=""></span> Bookings</a></li>

           <li class="">
                  <a href="<?php echo URL?>admin/logout">
                    <span class=""></span> Log out</a>
                </li>

          

           

           
            

                    <?php

          
        }else{
          ?>
          
          <?php
        }
        
      ?>
              

          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </div>