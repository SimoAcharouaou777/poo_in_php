<?php
namespace App\model;

include_once __DIR__ .'/../connection/connect.php';



  class User{
    private $username ;
    private $fullname ;
    private $password;
    private $location;
    private $phone_number;
    private $email;
    private $birthday;

    public function __construct($username , $fullname,$password ,$location,$phone_number,$email,$birthday){
      $this->username     = $username;
      $this->fullname     = $fullname;
      $this->password     = $password;
      $this->location     = $location;
      $this->phone_number = $phone_number;
      $this->email        = $email;
      $this->birthday     = $birthday;
      
    }

    public function create(){
        global $connect ;
        $hashpassword = password_hash($this->password , PASSWORD_DEFAULT);
        $sql="INSERT INTO users (username , full_name , password) VALUES(?,?,?)";
        $stmt = mysqli_prepare($connect , $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt , "sss", $this->username , $this->fullname , $hashpassword);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }else{
            echo"error : ".mysqli_error($stmt);
        }
    }

    public function update($fullname, $location , $phone_number , $email , $birthday){
      global $connect;
       $sql ="UPDATE users SET full_name = ? , location = ? , phone_number = ? , email = ? , birthday = ? WHERE username = ?";
       $stmt = mysqli_prepare($connect,$sql);
       if($stmt){
        mysqli_stmt_bind_param($stmt , "ssssss" , $fullname, $location , $phone_number , $email , $birthday,$username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
       }else{
        echo"error : ".mysqli_error($stmt);
       }
    }
   
    public function getByUsername(){
        global $connect;
       $sql ="SELECT * FROM users WHERE username = ?";
       $stmt = mysqli_prepare($connect , $sql);
       if($stmt){
        $username=$this->username;
        mysqli_stmt_bind_param($stmt, "s" , $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
          mysqli_stmt_close($stmt);
          return $row;  
        }else{
          return null;
        }
       }else{
        echo"error : ".mysqli_error($stmt);
       }

    }
    public static function getUserdata($username){
      global $connect;
     $sql ="SELECT * FROM users WHERE username = ?";
     $stmt = mysqli_prepare($connect , $sql);
     if($stmt){
      mysqli_stmt_bind_param($stmt, "s" , $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        mysqli_stmt_close($stmt);
        return $row;  
      }else{
        return null;
      }
     }else{
      echo"error : ".mysqli_error($stmt);
     }

  }

  }