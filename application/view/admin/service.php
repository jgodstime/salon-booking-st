
<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Service;
 $Service = (new Service);
?>
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="panel">
                <div class="panel-heading">
                    <?php $msg->display(); ?>   
                    <h2 class="text-primary text-center">Add Room Category </h2>
                </div>
                <div class="panel-body " >
                   
                   <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" role="form" enctype="multipart/form-data">
                        <div class="col-md-6">
                        <div class="form-group text-left">
                           <label for="">Room Category Name</label>
                           <input type="text" name="roomName" class="form-control" id="" placeholder="Enter Room Name">
                       </div>
                        </div>
                     
                        <div class="col-md-6">
                         <div class="form-group text-left">
                           <label for="">Price</label>
                           <input type="text" name="price" class="form-control">
                       </div>
                       </div>

                       <div class="col-md-6">
                       <div class="form-group text-left">
                           <label for="">Number Of Rooms</label>
                           <input type="text" name="numberOfRooms" class="form-control">
                       </div>
                       </div>

                       <div class="col-md-6">

                       <div class="form-group text-left">
                           <label for="">Room Image</label>
                           <input type="file" name="file" class="form-control">
                       </div>
                       </div>

                       <div class="col-md-12">

                       <div class="form-group text-left">
                           <label for=""> Description</label>
                            
                            <textarea name="description" id="input" class="form-control" ></textarea>
                            
                       </div>
                       </div>
                   
                       
                   
                       <button type="submit" name="addServiceBtn" class="btn btn-primary ">Add Service</button>
                   </form>
                   
                </div>
               
            </div>
        </div>


        <div class="col-md-7">
            <div class="row">
            <div class="panel panel-body ">
          
            <?php
            $Service->serviceRecord();
            ?>
              </div>
        </div>
        </div>
    </div>
</div>
