<?php 
namespace App\http\controller;


require_once (__DIR__.'/../../Product.php');
require_once (__DIR__.'/../../user.php');

use App\Product;
use App\Traits\UploadImage;
use App\Traits\logger;
use App\user;
use App\BaseModel;
use App\Mail\Mail;
use App\Interfaces\Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class homeController{
    use UploadImage,logger;
    private $product;
    // private $mail;
    public function __construct(Product $product, Notification $notification){
        $this->product =$product;
        $this->notification= $notification;
    }
    public function index(){
      
        $this->notification->send();
       echo ' Send Mail ';
        // $user= new user();
        // $users = $user->getListUser();
        // return  $users;
        // echo '<pre>';
        // print_r( $this->product);
        // echo '</pre>';
       
        // $products = $this->product->listProducts();
        // return  $products;  
        
        // $string = $this->UploadImages()."logger: ".$this->Loggers();
        // return  $string ; 

    // require_once(ROOT_PATH.'resources/views/home.php');


    }
    // public function UploadImages(){
    //     return "call upload image form homecontroller";
    // }

    public function login(){
        $this->notification->send();
        echo ' Send Mail ';
    }
}
