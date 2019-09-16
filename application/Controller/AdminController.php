<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Core\AdminView;
use Mini\Core\View;
use Mini\Model\AdminBooking;

use Mini\Model\Service;



class AdminController
{
    var $View;
    public $msg;
   
    function __construct() {
        $this->View = new AdminView();
        $this->msg = new \Mini\Libs\FlashMessages();      

    }


    public function index()
    {
        if(isset($_POST['loginBtn'])){
            $password = trim($_POST['password']);
            $email = trim($_POST['email']);
         

            if(empty($password)){
                 $this->msg->error('Password is required.');	
            }if(empty($email)){
                $this->msg->error('Email is required.');	
            }
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
              
            }else{
               (new \Mini\Model\Admin)-> adminLogIn($email,$password);
            }

            
        }else{

         // html data    
     $data["title"] = "Admin"; /* for <title></title> inside header.php in this case */
     // load views
     $this->View->render('admin/login', $data);
         
    }
    
      
    }


    public function services()
    {


        if(isset($_POST['deleteServiceBtn'])){
            $serviceId = $_POST['serviceId'];
            (new Service)->deleteService($serviceId);
            
        }   

        if(isset($_POST['addServiceBtn'])){

             $fileName = $_FILES['file']['name'];
            $temporaryFile = $_FILES['file']['tmp_name'];

            $allowed =  array('png','jpeg','jpg','gif');
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
          


            $roomName = $_POST['roomName'];
            $price = $_POST['price'];
            $numberOfRooms = $_POST['numberOfRooms'];
            $description = $_POST['description'];


            if(!in_array($ext,$allowed)){
                $this->msg->error('The file must be an image file.');	
            }if(empty($roomName)){
                $this->msg->error('Room name is required.');
            }if(empty($price)){
                $this->msg->error('Price is required.');
            }if(empty($numberOfRooms)){
                $this->msg->error('Number of room is required.');
            }if(empty($description)){
                $this->msg->error('Service description is required.');
            }
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
                die();
            }else{
                (new Service)->saveService($roomName,$price,$numberOfRooms,$description,$fileName,$temporaryFile);
            }
        }                

            // html data
            $data["title"] = "Service"; /* for <title></title> inside header.php in this case */
            // load views
            $this->View->render('admin/service', $data);      
    }

   
    public function bookings()
    {


        if(isset($_POST['updateBookingStatusBtn'])){
            $status = $_POST['status'];
            $bookingId = $_POST['bookingId'];
            (new AdminBooking)->updateBookingStatus($bookingId,$status);
            
        }   

    

            // html data
            $data["title"] = "Bookings"; /* for <title></title> inside header.php in this case */
            // load views
            $this->View->render('admin/bookings', $data);      
    }


    public function customers(){
        // html data
        $data["title"] = "Customers"; /* for <title></title> inside header.php in this case */
        // load views
        $this->View->render('admin/customers', $data);   
    }
   

    
    public function logout()
    {
        unset($_SESSION['adminId']);
        header('location:'. URL.'admin');
    }

}
