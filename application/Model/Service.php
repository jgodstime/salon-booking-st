<?php

namespace Mini\Model;

use Mini\Core\Model;
use PDO;


class Service extends Model
{
    

    
    public function selectService(){
        $query = $this->db -> prepare("SELECT * FROM service_tbl ");
        $query -> execute(array($id));
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 

            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }



    public function saveService($serviceName,$description){

      
    $queryInsert = $this->db->prepare("INSERT INTO service_tbl (id,name,description,created_at) VALUES(?,?,?,now())");
    $queryInsert->execute(array('',$serviceName,$description));

        //print_r($this->db->errorInfo());

    if($queryInsert){
        $this->msg->success('Successfully Registered.', $_SERVER['HTTP_REFERER']);
    }else{
        $this->msg->success('Unable to register at this time, please try again later.', $_SERVER['HTTP_REFERER']);
    }

    }


    public function serviceRecord(){
        $query = $this->db -> prepare("SELECT * FROM  service_tbl ORDER BY id DESC");
        $query->execute();
        if($query->rowCount()>0){
    
            
    ?>
    <h2 class=""> Services</h2>
    <div class="table-responsive">
    
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Service name</th>
                  
                    <!-- <th>Description</th> -->
                    <th>Created at</th>
                    <th>Delete</th>
                   
                </tr>
            </thead>
            <?php
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ 

                ?>
            <tr class="text-left">
                <td><?php echo $row['name'];?></td>
              
                <!-- <td> <?php //echo $row['description'];?> </td> -->

                <td><?php echo date("M d, Y h:i a",strtotime($row['created_at']) );?></td>
                <td> 
                <form method="POST" onsubmit="return confirm('Do you really want to delete?');">
                    <input type="hidden" name="serviceId" value="<?php echo $row['id'];?>">
                    <button type="submit" class="btn btn-sm btn-danger"  name="deleteServiceBtn">
                    <i class="glyphicon glyphicon-trash"> </i>
                    </button>
                    </form>     
                </td>
               
              
            </tr>
    
            <?php
             }    
            ?>
        </table>
    </div>
    <?php
        }else{
            echo '<div>
                <a class="list-group-item">No Record Found.</a>
            </div>';	
        }			
    
    }
      



    public function deleteService($serviceId)
    {
        $queryDelete = $this->db->prepare("DELETE FROM service_tbl WHERE id = ?");
        $queryDelete->execute(array($serviceId));
        if($queryDelete){
            $this->msg->success('Service successfully deleted.', $_SERVER['HTTP_REFERER']);  
        }else{
            $this->msg->error('Unable to delete Service at this time, please try again later.', $_SERVER['HTTP_REFERER']);            

        }
    }

   




}
