<?php

include_once('../connection/connect.php');
include('../model/user.php');


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];

    if(empty($username) || empty($fullname) || empty($password)){
        echo"all the fields are required";
    }else{

        $user = new User($username, $fullname , $password);
        $userdata = $user->getByUsername();
        if($userdata){
          echo"this username is already exist";
        }else{
            $user->create();
            header("location:../vue/login.php");
        }
    }
}

?>