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

         
            $serviceName = $_POST['name'];
            // $price = $_POST['price'];

            $description = 'none';//$_POST['description'];

            if(empty($serviceName)){
                $this->msg->error('Service name is required.');
            }if(empty($description)){
                $this->msg->error('Service description is required.');
            }
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
                die();
            }else{
                (new Service)->saveService($serviceName,$description);
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
