<?php 
session_start();
if(count($_SESSION)<1){
    header("Location:./../index.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $con=mysqli_connect("localhost","root","","privdb");
    $u=$_SESSION['uname'];
    if(!$con){
        echo "<script>alert('DB not connected');</script>";
        exit;
    }
    $d=$_POST['task'];
    $s="INSERT INTO todo ( uname, task ) VALUES ( '".$u."', '".$d."');";
    $r=mysqli_query($con,$s);
    if(!$r){
        echo '<script>alert("error in posting todo");</script>';
        exit;

    }else{
        echo '<script>alert("Task Saved Successfully.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./todo.php" ;}, 10);</script>';
            exit;

    }
}
?>

