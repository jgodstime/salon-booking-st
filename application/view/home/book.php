
<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Register;
 $Register = (new Register);
 

//  Check if all sesson is set for booking
 if(isset($_SESSION['arrival']) && !empty($_SESSION['arrival'])  && isset($_SESSION['departure']) && !empty($_SESSION['departure'])   &&  isset($_SESSION['serviceId']) && !empty($_SESSION['serviceId'])  &&  isset($_SESSION['numberOfRooms']) && !empty($_SESSION['numberOfRooms']) ){

    
   if(isset($_SESSION['userId'])){
       $bookingId = rand(4444,99999);
        // book user and sign destroy session
        ?>
            <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="background-color:white; margin-top:10px; padding-top:20px;">
            <?php $msg->display();?>
            <h3 class="text-center"> Booking Information </h3>
            <!-- <hr> -->
           
           <table class="table table-hover table-bordered ">
          
               <!-- <thead>
                   <tr>
                       <th></th>
                   </tr>
               </thead> -->
               <tbody>
                    <tr>
                       <td>Name</td>
                       <td><?php echo $Register->getCustomerInfo($_SESSION['userId'])->name?></td>
                    </tr>

                    <tr>
                       <td>Email</td>
                       <td><?php echo $Register->getCustomerInfo($_SESSION['userId'])->email?></td>
                    </tr>

                   <tr>
                       <td>Booking ID</td>
                       <td><?php echo $bookingId?></td>
                   </tr>

                   <tr>
                       <td>Arrival</td>
                       <td><?php echo $_SESSION['arrival']; ?></td>
                   </tr>

                   <tr>
                       <td>Departure</td>
                       <td><?php echo $_SESSION['departure']; ?></td>
                   </tr>
                   <tr>
                       <td>Room Category</td>
                       <td><?php echo $Register->getServiceInfo($_SESSION['serviceId'])->room_name?></td>
                    </tr>
                    <tr>
                       <td>Amount Per Night</td>
                       <td>&#8358;<?php echo $Register->getServiceInfo($_SESSION['serviceId'])->price?></td>
                    </tr>


                   <tr>
                       <td>Number of Room</td>
                       <td><?php echo $_SESSION['numberOfRooms']; ?></td>
                   </tr>

                   <tr>
                       <td>Number of Days</td>
                       <td><?php echo $_SESSION['days']; ?></td>
                   </tr>

                   <tr>
                       <td>Amount Payable</td>
                       <td><?php echo $_SESSION['amountPayable']; ?></td>
                   </tr>
                  
                  
               </tbody>
           </table>
        <form action="<?php $_SERVER['REQUEST_URI']?>" method="post">
           <div class="text-center">
           <input type="hidden" name="bookingId" value="<?php echo $bookingId; ?>">
           <button type="submit" name="completeBookingBtn" id="" class="btn btn-primary" >Complete Booking</button>
           
           </div>
           </form>
           
           

        </div>

    </div>

</div>



        <?php

   }else{
     $msg->success('Register to complete booking', URL.'register');

   }
    


 }else{
     
?>
<div class="container">
    <div class="row">
        <div class="col-md-10">

            <?php
                $msg->display();
             $Register->listServices();
             ?>
        </div>


    </div>
</div>

<?php }?>
