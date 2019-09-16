

<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Lend;
 

?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="background-color:white; margin-top:10px; padding-top:20px;">
            <?php $msg->display();?>
            <h3> Create Account </h3>
            <hr>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="" role="form" enctype="multipart/form-data">
                   
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="" for="">Full Name </label>
                            <input type="text" class="form-control" placeholder="Enter name" name="name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="" for="">Email </label>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="" for="">Phone Number</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="" for="">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label class="" for="">Address</label>
                        
                        <textarea name="address" id="input" class="form-control"></textarea>
                        <small><a href="<?php echo URL.'home/login'?>" >Already have an account</a></small>
                        
                    </div>
                </div>
                
                
            
                


                <div class="form-group">
                    <button type="submit" name="registerCustomerBtn" class="btn btn-primary btn-block">Submit</button>
                </div>

            </form>

        </div>

    </div>

</div>
