<?php
namespace Mini\Controller;

use Mini\Core\View;
use Mini\Model\Register;


class RegisterController
{
    var $View;
    public $msg;
   
    function __construct() {
        $this->View = new View();
        $this->msg = new \Mini\Libs\FlashMessages();
    }


    public function index()
    {
        if(isset($_POST['registerCustomerBtn'])){
            $name = ucwords($_POST['name']);
            $email = ($_POST['email']);
            $phoneNumber = $_POST['phone'];
            $password = $_POST['password'];
            $address = ucwords($_POST['address']);
           


            if(empty($name)){
                $this->msg->error('Full name is required.');
            }if(empty($email)){
                $this->msg->error('Email is required.');
            }if(empty($phoneNumber)){
                $this->msg->error('Phone number is required.');
            }if(empty($password)){
                $this->msg->error('password is required.');
            }if(empty($address)){
                $this->msg->error('Address is required.');
            }
            if ($this->msg->hasErrors()){
                header('location:' . $_SERVER['HTTP_REFERER']);
                die();
            }else{
                
                (new Register())->registerCustomer($name,$email,$phoneNumber,$address,$password);
            }

        }
            // html data
            $data["title"] = "Register Member"; /* for <title></title> inside header.php in this case */
            // load views
            $this->View->render('home/regMember', $data);
    }

   


 
   
}
