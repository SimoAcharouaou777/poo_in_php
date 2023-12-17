<?php

namespace App\controller;

session_start();
include_once(__DIR__.'/../connection/connect.php');
use App\model\User;

class AuthController 
{

    public function signup($username, $fullname, $password, $location, $phone_number, $email, $birthday ){
    
    
        if(empty($username) || empty($fullname) || empty($password)){
            echo"all the fields are required";
        }else{
    
            $user = new User($username, $fullname , $password , $location , $phone_number , $email , $birthday);
            $userdata = $user->getByUsername();
            if($userdata){
              echo"this username already exists";
            }else{
                $user->create();
                header("location:../../vue/login.php");
            }
        }
    }

    public function login($username , $fullname , $password){

        if(empty($username) || empty($password)){
            echo"all the fields are required";
        }else{
            $user = new User($username ,$fullname ,$password , $location , $phone_number , $email,$birthday);
            $userData = $user->getByUsername();
            if($userData && password_verify($password , $userData['password'])){
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $userData['id']; 
                $_SESSION['fullname'] = $fullname;
              
                
                if($userData['role'] == "user"){
                    header("location:../../vue/user/user.php");
                    exit();
                }else{
                    header("location:../../vue/admin/admin.php");
                    exit();
                }
                
            }else{
                echo"invalid username or password";
            }
        }
    }
}

if(isset($_POST['submitup'])){
    
    $auth = new AuthController();

    $auth->signup( $_POST['username'] , $_POST['fullname'] , $_POST['password'] , $_POST['location'] , $_POST['phone_number'],$_POST['email'],$_POST['birthday']);
}

if(isset($_POST['submitin'])){

    $auth = new AuthController();
    $auth->login($_POST['username'] ,$_POST['fullname'], $_POST['password']);
}
if(isset($_POST['submitsave'])){
   
    $user = new User($_POST['username'] ,'', $_POST['fullname'] , $_POST['location'] , $_POST['email'],$_POST['phone_number'], $_POST['birthday']);
    $user->update($_POST['username'],$_POST['fullname'],$_POST['location'] , $_POST['email'] ,$_POST['phone_number'] ,$_POST['birthday'] );
    header("location:../../vue/user/user.php");
}
?>