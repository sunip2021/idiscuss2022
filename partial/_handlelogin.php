<?php
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email=$_POST['loginEmail'];
    $pass=$_POST['loginpass'];
    $sql="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$sql);
    $numRows=mysqli_num_rows($result);
    if($numRows==1){
       while($row=mysqli_fetch_assoc($result)){
        if(password_verify($pass,$row['user_pass'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno']=$row['sno'];
            $_SESSION['useremail']=$email;
            // echo 'logged in'.$email;
            header("location:/forum/index.php");
            // exit();

        }else{
            header("location:/forum/index.php");
        }

        
    }
}
    else{
        header("location:/forum/index.php");

    }

}


    ?>