<?php

namespace Mini\Model;

use Mini\Core\Model;
use PDO;


class AdminBooking extends Model
{



    public function getCustomerInfo($id){
        $query = $this->db -> prepare("SELECT * FROM customer_tbl WHERE id = ? LIMIT 1");
        $query -> execute(array($id));
        $result = $query->fetch();
        return $result;
    }

    public function getServiceInfo($id){
        $query = $this->db -> prepare("SELECT * FROM service_tbl WHERE id = ? LIMIT 1");
        $query -> execute(array($id));
        $result = $query->fetch();
        return $result;
    }

    public function getBookingInfo($id){
        $query = $this->db -> prepare("SELECT * FROM booking_tbl WHERE id = ? LIMIT 1");
        $query -> execute(array($id));
        $result = $query->fetch();
        return $result;
    }



    public function adminBookingRecord(){
        $query = $this->db -> prepare("SELECT * FROM  booking_tbl ORDER BY id DESC");
        $query->execute();
        if($query->rowCount()>0){
    
     
    ?>
    <h2 class=""> Bookings</h2>
    <div class="table-responsive">
    
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Booked Date</th>
                    <th>Booked Time</th>
                   
                    <th>Status</th>
                    <th>Created at</th>
                   
                </tr>
            </thead>
            <?php
            // id,booking_id,customer_id,service_id,number_of_room,arrival,departure,status,created_at
            while($row = $query->fetch(PDO::FETCH_ASSOC)){ 

                ?>
    
            <tr class="text-left">
                <td> <?php echo $row['booking_id'];?> </td>

                <td><?php echo $this->getCustomerInfo($row['customer_id'])->name;?></td>
                <td><?php echo $this->getServiceInfo($row['service_id'])->name;?></td>
                <td> <?php echo date("M d, Y",strtotime($row['book_date']) );?> </td>
                <td> <?php echo $row['book_time'];?> </td>
                
                <td> 
                <form method="POST" onsubmit="return confirm('Do you really want to update booking status?');">
                    <input type="hidden" name="bookingId" value="<?php echo $row['id'];?>">
                    <div class="form-group">
                    <?php echo $row['status'];?>
                        <select id="my-select" class="form-control" name="status" style="width:80px;">
                            <option>Select Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Awaiting Confirmation">Awaiting Confirmation</option>
                            <option value="Confirmed">Confirmed</option>
                            <option value="Canceled">Canceled</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-danger"  name="updateBookingStatusBtn">
                    <i class="glyphicon glyphicon-edit"> </i>
                    </button>
                    </form>     
                </td>
                <td><?php echo date("M d, Y h:i a",strtotime($row['created_at']) );?></td>

               
              
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
      

    public function updateBookingStatus($bookingId,$status)
    {

        if( $status== 'Canceled' || $status== 'Completed'){
            $numberOfRoomsBooked = $this->getBookingInfo($bookingId)->number_of_room; //booingId is the id field and not booking_id field
            $serviceId = $this->getBookingInfo($bookingId)->service_id; 

            $oldBookedVal = $this->getServiceInfo($serviceId)->number_of_room_booked; //get the old val
            $newlyBookedVal =  $oldBookedVal - $numberOfRoomsBooked; //add with th ene val

            $this->updatenumberOfRoomsBooked($serviceId,$newlyBookedVal); //call update functon

        }
        
        $queryUpdate = $this->db->prepare("UPDATE booking_tbl set status = ? WHERE id = ?");
        $queryUpdate->execute(array($status, $bookingId));
        if($queryUpdate){
            $this->msg->success('Booking status successfully updated.', $_SERVER['HTTP_REFERER']);  
        }else{
            $this->msg->error('Unable to update booking  status at this time, please try again later.', $_SERVER['HTTP_REFERER']);            

        }
    }

    
    public function updatenumberOfRoomsBooked($serviceId,$newlyBookedVal)
    {
        $queryUpdate = $this->db->prepare("UPDATE service_tbl set number_of_room_booked = ? WHERE id = ?");
        $queryUpdate->execute(array($newlyBookedVal, $serviceId));
        if($queryUpdate){
            // $this->msg->success('Booking status successfully updated.', $_SERVER['HTTP_REFERER']);  
        }else{
            $this->msg->error('Unable to update booking  status at this time, please try again later.', $_SERVER['HTTP_REFERER']);            

        }
    }




   




}
