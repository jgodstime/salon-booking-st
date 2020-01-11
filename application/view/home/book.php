
<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Register;
 $Register = (new Register);
 

//  Check if all sesson is set for booking
 if(isset($_SESSION['serviceTime']) && !empty($_SESSION['serviceTime'])  && isset($_SESSION['serviceDate']) && !empty($_SESSION['serviceDate'])   &&  isset($_SESSION['serviceId']) && !empty($_SESSION['serviceId']) ){

    
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
                       <td>Date</td>
                       <td><?php echo date("M d, Y",strtotime($_SESSION['serviceDate']) ); ?></td>
                   </tr>
                   <tr>
                       <td>Time</td>
                       <td><?php echo $_SESSION['serviceTime']; ?></td>
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
            //  $Register->listServices();
            echo '<a href="'.URL.'">Click to book</a>'

             ?>
        </div>


    </div>
</div>

<?php }?>
