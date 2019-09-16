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

use Mini\Core\View;

class HomeController
{
    var $View;
    public $msg;
   
    function __construct() {
        $this->View = new View();
        $this->msg = new \Mini\Libs\FlashMessages();
      
    }

    public function login()
    {
        if(isset($_POST['loginBtn'])){
            $password = ($_POST['password']);
            $email = ($_POST['email']);
         

            if(empty($password)){
                 $this->msg->error('Password is required.');	
            }if(empty($email)){
                $this->msg->error('Email is required.');	
            }
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
              
            }else{
               (new \Mini\Model\Register)-> customerLogIn($email,$password);
            }

            
        }else{

         // html data    
     $data["title"] = "Customer"; /* for <title></title> inside header.php in this case */
     // load views
     $this->View->render('home/login', $data);
         
    }
}



public function booked()
{

    

    $data["title"] = "Booked Record"; 
    $this->View->render('home/booked', $data);
     
}

    
    public function book()
    {

        if(isset($_POST['bookBtn'])){
            
           

            if(empty($_POST['numberOfRooms'])){
                 $this->msg->error('Number of room is required.');	
            }
            
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
              
            }
            else{
                
                $_SESSION['serviceId'] = $_POST['serviceId'];
                $_SESSION['numberOfRooms'] = $_POST['numberOfRooms'];

                $_SESSION['amountPayable'] = $_POST['price'] * $_SESSION['numberOfRooms'] * $_SESSION['days'];

                // determin price


            }

        }

        if(isset($_POST['completeBookingBtn'])){

            (new \Mini\Model\Register)->saveBooking($_POST['bookingId'],$_SESSION['userId'],$_SESSION['serviceId'],$_SESSION['numberOfRooms'],$_SESSION['arrival'],$_SESSION['departure'],$_SESSION['amountPayable'],$_SESSION['days'],'Pending');
            
        }
        

        $data["title"] = "Book for room"; 
        $this->View->render('home/book', $data);
         
    }
    
    

    public function index()
    {
        if(isset($_POST['arrivalDepartureBtn'])){
            $arrival = ($_POST['arrival']);
            $departure = ($_POST['departure']);

            $_SESSION['arrival'] = $arrival ;
            $_SESSION['departure'] = $departure;

            // Determine days

            $start = strtotime($arrival);
            $end = strtotime($departure);

            $days = ceil(abs($end - $start) / 86400);


           
            $_SESSION['days'] = $days;

            header('location:'.URL.'home/book');
             
        }
         require APP . 'view/home/index.php';
        //  $data["title"] = "Book for room"; 
        //  $this->View->render('home/index', $data);
  
    }


    public function logout()
    {
        unset($_SESSION['userId']);
        $this->msg->info('You are logged out.',URL);	

        // header('location:'. URL.'home');
    }
}
