<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>security</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container-xl px-4 mt-4">
        <nav class="nav nav-borders">
        <a class="nav-link  ms-0" href="user.php" target="__blank">Profile</a>
        <a class="nav-link active" href="UserSecurity.php" target="__blank">Security</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                       <?php
                    //    $error = array();
                    //    $succesMessage = "";
                    //    $id="";
                    //    if(isset($_GET['id'])){
                    //     $id = $_GET['id'];
                    //    }
                    //    if(isset($_POST['submit'])){
                    //     $current_password = $_POST['current_password'];
                    //     $new_password = $_POST['new_password'];
                    //     $hashpassword = password_hash($new_password,PASSWORD_DEFAULT);
                    //     $confirm_password = $_POST['confirm_password'];
                    //     if(empty($current_password) || empty($new_password) || empty($confirm_password)){
                    //         $error[]="all the fields are required ";
                    //     }
                    //     else{
                    //         $sql="SELECT * FROM users WHERE id= ?";
                    //         $stmt = mysqli_prepare($connect,$sql);
                    //         if($stmt){
                    //             mysqli_stmt_bind_param($stmt,"i", $id);
                    //             mysqli_stmt_execute($stmt);
                    //             $result = mysqli_stmt_get_result($stmt);
                    //             $row = mysqli_fetch_assoc($result);
                    //         }
                    //        if(password_verify($current_password,$row['password'])  && $new_password == $confirm_password ){
                    //     $sql= "UPDATE users SET password = ? WHERE id = ? ";
                    //     $stmt= mysqli_prepare($connect,$sql);
                    //     if($stmt){
                    //         mysqli_stmt_bind_param($stmt, "si" ,$hashpassword,$id);
                    //         $result = mysqli_stmt_execute($stmt);
                    //         if($result){
                    //             $succesMessage= "password updated succsefully ";
                    //            }else{
                    //             $error[]="error : ".mysqli_stmt_error($stmt);
                    //            }
                    //            mysqli_stmt_close($stmt);
                    //     }
                           
                    //     }else{
                    //         $error[]="check your passwords !!";
                           
                    //     }
                    //    }
                    //    if (!empty($error)) {
                    //     echo '<div class="alert alert-danger" role="alert">';
                    //     foreach ($error as $error) {
                    //         echo $error . "<br>";
                    //     }
                    //     echo '</div>';
                    // }
                    // if(!empty($succesMessage)){
                    //     echo '<div class="alert alert-success" role="alert">';
                    //     echo $succesMessage;
                    //     echo '</div>';
                    // }
                    
                    // }
                    //    ?>          
                        <form action="" method ="post">
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="current_password" id="currentPassword" type="password" placeholder="Enter current password">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" name="new_password" id="newPassword" type="password" placeholder="Enter new password">
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="confirm_password" id="confirmPassword" type="password" placeholder="Confirm new password">
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit" >Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                        <a class="btn btn-danger-soft text-danger" href="deleteprofile.php?id=<?=$id?>" >I understand, delete my account </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>