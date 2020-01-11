<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Register;
 $Register = (new Register);

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['userId'])){
                    echo $Register->bookedRecord(); 
                }else{
                    echo '<a href="'.URL.'home/login">Login </a> to see your booked information';
                }
            ?>
            
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <?php 
                echo $Register->otherBookings(); 
                
            ?>
            
        </div>
    </div>

</div>






