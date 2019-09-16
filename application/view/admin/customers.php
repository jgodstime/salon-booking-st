
<?php
 $msg = new \Mini\Libs\FlashMessages();
 use Mini\Model\Admin;
 $Admin = new Admin;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-body">
        <?php
            $Admin->customersRecord();
            ?>
               
            </div>
        </div>


       
    </div>
</div>
