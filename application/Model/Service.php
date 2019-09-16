<?php

namespace Mini\Model;

use Mini\Core\Model;
use PDO;


class Service extends Model
{
    

    public function saveService($roomName,$price,$numberOfRooms,$description,$fileName,$temporaryFile){

        $materialCode =  rand(3000,10000).rand(9000,10000).rand(200,4000);
       
        $writerCodeForThisMat = $materialCode;
        $temp = explode(".", $fileName);
        $newFileName = $writerCodeForThisMat . '.' . end($temp); //renaming the material with
        move_uploaded_file($temporaryFile,'images/'.$newFileName);

    $queryInsert = $this->db->prepare("INSERT INTO service_tbl (id,room_name,price,number_of_room,number_of_room_booked,description,image,created_at) VALUES(?,?,?,?,?,?,?,now())");
    $queryInsert->execute(array('',$roomName,$price,$numberOfRooms,0,$description,$newFileName));

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
    <h2 class=""> Room Category</h2>
    <div class="table-responsive">
    
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Room Category</th>
                    <th>Price</th>
                    <th>Number of rooms</th>
                    <th>Booked</th>
                    <th>Room Image</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th>Delete</th>
                   
                </tr>
            </thead>
            <?php
            
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ 

                ?>
            <tr class="text-left">
                <td><?php echo $row['room_name'];?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['number_of_room'];?></td>
                <td><?php echo $row['number_of_room_booked'];?></td>
                <td> <a href="<?php echo URL.'images/'. $row['image'];?>">See Image</a> </td>
                <td> <?php echo $row['description'];?> </td>

                <td><?php echo $row['created_at'];?></td>
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
