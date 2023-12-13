<?php
include_once('../connection/connect.php');
include('../model/user.php');
session_start();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo"all the fields are required";
    }else{
        $user = new User($username ,$fullname ,$password);
        $userData = $user->getByUsername();
        if($userData && password_verify($password , $userData['password'])){
            $_SESSION['username'] = $username;
            if($userData['role'] == "user"){
                header("location:../vue/user/user.php");
                exit();
            }else{
                header("location:../vue/admin/admin.php");
                exit();
            }
            
        }else{
            echo"invalid username or password";
        }
    }
}

?>