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
    if(!isset($_GET['id'])){
        unset($_SESSION['uflag']);
        header("Location:./todo.php");
        exit;
    }
    $s="UPDATE todo SET status = true WHERE tid =".$_GET['id'];
    $r=mysqli_query($con,$s);
    if(!$r){
        echo '<script>alert("error in marking todo");</script>';
        exit;

    }else{
        echo '<script>alert("Task Marked as Completed.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./todo.php" ;}, 10);</script>';
            exit;

    }

?>
    