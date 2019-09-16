<?php

/**
 * Class Songs
 * This is a demo Model class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Model;

use Mini\Core\Model;
use PDO;


class Admin extends Model
{

     
public function adminLogIn($email,$password){
    if(!empty($email) or !empty($password)){
        $password = sha1($password);
        // die($password);
        $query = $this->db->prepare("SELECT * FROM admin WHERE email=? AND password=? LIMIT 1");
        $query -> execute(array($email,$password));
        if ($query->rowCount()>0){
            $result = $query->fetch(PDO::FETCH_ASSOC); 
             $email= $result["email"];
             $adminId = $result["id"];
             $passwordDb = $result["password"];
             
    
            $_SESSION["adminId"] = $adminId;

                header('location:'.URL.'admin/services');       
           
          
    }else{
        return $this->msg->error('Invalid email and password combination.', $_SERVER['HTTP_REFERER']);

    }
        
    }else{
        return $this->msg->error('Email and password are required.', $_SERVER['HTTP_REFERER']);
        
    }
    

}



public function customersRecord(){
    $query = $this->db -> prepare("SELECT * FROM  customer_tbl ORDER BY id DESC");
    $query->execute();
    if($query->rowCount()>0){

 
?>
<h2 class=""> Customers</h2>
<div class="table-responsive">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Created at</th>
               
            </tr>
        </thead>
        <?php
        
        while($row = $query->fetch(PDO::FETCH_ASSOC)){ 

            ?>

        <tr class="text-left">
           
            <td> <?php echo $row['name'];?> </td>
            <td> <?php echo $row['email'];?> </td>
            <td> <?php echo $row['phone'];?> </td>
            <td> <?php echo $row['address'];?> </td>
            <td><?php echo $row['created_at'];?></td>

           
          
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
  

    
}