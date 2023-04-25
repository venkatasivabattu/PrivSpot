<?php
    session_start();
    if(count($_SESSION)<1){
        header("Location:./../index.php");
        exit;
    }              
    $con=mysqli_connect("localhost","root","","privdb");
    $u=$_SESSION['uname'];
    if(!$con){
        echo "<script>alert('DB not connected');</script>";
        exit;
    }
    $s="DELETE FROM users WHERE uname = '".$u."'";
    $r=mysqli_query($con,$s);
    if(!$r){
        print("error while deleting user");
        exit;
    }
    else{
        session_unset();
        session_destroy();
        header("Location:../index.php");
        exit;
    }
?>