<?php
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email=$_POST['signupEmail1'];
    $pass=$_POST['signuppassword'];
    $cpass=$_POST['signupcpassword'];
    //check whether this email exist
    $existSql="SELECT * FROM `users` where user_email=`$user_email`";
    $rsult=mysqli_query($conn,$existSql);
    $numRows=mysqli_num_rows($rsult);
    if($numRows>0){
        $showError="Email already in use";
    }else{
    if($pass==$cpass){
        $hash=password_hash($pass,PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` ( `user_email`, `user_pass`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp()) ";
        $rsult=mysqli_query($conn,$sql);
        if($rsult){
            $showAlert=true;
            header("location:/forum/index.php?signupsuccess=true");
            exit();
        }

    }else{
        $showError="password do not match";
        
        

    }

}
header("location:/forum/index.php?signupsuccess=false&error= $showError");
}
?>