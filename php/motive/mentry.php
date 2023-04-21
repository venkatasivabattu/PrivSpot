<?php 
session_start();
if(count($_SESSION)<1){
    header("Location:./../index.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_SESSION['search'])){
        unset($_SESSION['search']);
    }
    $con=mysqli_connect("localhost","root","","privdb");
    $u=$_SESSION['uname'];
    if(!$con){
        echo "<script>alert('DB not connected');</script>";
        exit;
    }
    $d=$_POST['quote'];
    $s="INSERT INTO quotes ( uname, quote ) VALUES ( '".$u."', '".$d."');";
    $r=mysqli_query($con,$s);
    if(!$r){
        echo '<script>alert("error in posting quote");</script>';
        exit;

    }else{
        echo '<script>alert("Quote Saved Successfully.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./motive.php" ;}, 10);</script>';
            exit;

    }
}
?>

