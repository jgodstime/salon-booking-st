
<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\AdminBooking;
 $Booking = (new AdminBooking);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-body text-left">
        <?php
            $msg->display();
            $Booking->adminBookingRecord();
            ?>
               
            </div>
        </div>


       
    </div>
</div>
