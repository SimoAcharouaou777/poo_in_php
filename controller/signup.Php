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

        if( $user->getByUsername()){
          echo"this username is already exist";
        }else{
            $user->create();
        }
    }
}

?>