<?php
// A session is required
if (!session_id()) @session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <?php 
if (!session_id()) @session_start();
// session_destroy();
$msg = new \Mini\Libs\FlashMessages();
use Mini\Model\Service;
use Mini\Model\Register;

 
 ?>
  <title>
    Salon Booking
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



  <div class="navbar navbar-default navbar-static-top">
    <nav class="navbar navbar-default navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
            aria-expanded="false" aria-controls="navbar">
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
        if(isset($_SESSION["userId"])){
          ?>


            <li class="">
              <a href="<?php echo URL?>">
                <span class=""></span>Make Booking</a>
            </li>

            <li class="">
              <a href="<?php echo URL?>home/booked">
                <span class=""></span> Booked Record</a>
            </li>


            <li class="">
              <a href="<?php echo URL?>home/logout">
                <span class=""></span> Log out</a>
            </li>
            <?php

          
        }else{
          ?>
            <li class="">
              <a href="<?php echo URL?>register">
                <span class=""></span> Register</a>
            </li>


            <li class="">
              <a href="<?php echo URL?>home/login">
                <span class=""></span> Login</a>
            </li>
            <?php
        }
        
      ?>


          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
  </div>

  <?php $msg->display()?>
  <div class="jumbotron my-jumbotron">

    <span> Salon Booking </span>

    <p>

      <?php

      // if(!isset( $_SESSION["userId"])){
        ?>
      <!-- <a class="btn btn-lg btn-default" href="<?php URL ?>register" style="border-radius:20px; padding-left:30px;padding-right:30px;">Register</a>
        <a class="btn btn-lg btn-primary" href="<?php URL ?>home/login" style="border-radius:20px; padding-left:30px;padding-right:30px;">Login</a> -->
      <?php
        // }else{
          ?>
      <div class="row">
        <div class="col-md-7 col-md-offset-2">
          <form class="form-inline" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <!-- <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Service</div>
                <input type="date" class="form-control" name="arrival" placeholder="See">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Departure</div>
                <input type="time" class="form-control" name="departure" placeholder="Enter departure date">
              </div>
            </div>
           

            <div class="form-group">
              <button type="submit" name="arrivalDepartureBtn" class="btn btn-primary">Proceed</button>

            </div> -->  

            <div class="row">
            <div class="col-md-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-addon">Service</div>
                <select name="serviceId" class="form-control" required style="width:150px;">
                  <option value="">Select Service</option>
                  <?php (new Service)->selectService();?>
                </select>
              </div>
            </div>
            </div>
            <div class="col-md-4" >
            <div class="form-group" >
              <div class="input-group"  style="margin-left:0px;">
                <div class="input-group-addon" >Service Date</div>
                <input type="date" class="form-control" required name="serviceDate">
              </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group" style="margin-left:50px;">
              <div class="input-group">
                <div  class="input-group-addon">Service Time</div>
                <input type="time" class="form-control" required name="serviceTime" >
              </div>
            </div>
            </div>

            <div class="form">
              <button type="submit" name="selectServiceDetailsBtn" class="btn btn-primary btn-lg">Proceed</button>

            </div>
            </div>

            

            
          </form>
        </div>
      </div>


    </p>


  </div>


  <style>
    /* used to make the background image to be full*/

    body {
      margin: 0;
      padding: 0;
    }

    .my-jumbotron {
      background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('<?php echo URL; ?>img/salon.jpg');
      /* height:vh100; */
      background-repeat: no-repeat;
      height: 538px;
      background-size: 100% 100%;
      width: 100%;
      opacity: 2;
      font-size: 70px;
      color: white;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      display: block;
      padding-top: 2em;


    }


    .input-mini { width: 60px; } .input-small { width: 90px; } .input-medium { width: 150px; } .input-large { width: 210px; } .input-xlarge { width: 270px; } .input-xxlarge { width: 530px; } 
  </style>


</body>

</html>