<?php
    session_start();
    if(count($_SESSION)<1){
        header("Location:./../index.php");
        exit;
    }              
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $con=mysqli_connect("localhost","root","","privdb");
        $u=$_SESSION['uname'];
        if(!$con){
            echo "<script>alert('DB not connected');</script>";
            exit;
        }
        $s="DELETE FROM quotes WHERE qid = ".$id;
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error while deleting quote");
            exit;
        }
        else{
            echo '<script>alert("Quote Deleted.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./motive.php" ;}, 10);</script>';
            exit;
        }

    }
    else {
        header('Location: motive.php');
        exit;
    }
?>