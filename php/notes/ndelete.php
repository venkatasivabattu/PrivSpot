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
        $s="DELETE FROM notes WHERE nid = ".$id;
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error while deleting notes");
            exit;
        }
        else{
            echo '<script>alert("Notes Deleted.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./notes.php" ;}, 10);</script>';
            exit;
        }

    }
    else {
        header('Location: notes.php');
        exit;
    }
?>