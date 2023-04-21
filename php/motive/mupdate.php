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
    if($_SERVER['REQUEST_METHOD']=='POST'){
        unset($_SESSION['uflag']);
        unset($_SESSION['id']);
        unset($_SESSION['data']);
        $d=$_POST['quote'];
        print($d.''.$_POST['id']);
        $s="UPDATE quotes SET quote = '".$d."' WHERE qid =".$_POST['id'];
        $r=mysqli_query($con,$s);
        if(!$r){
            echo '<script>alert("error in updating quote");</script>';
            exit;
    
        }else{
            echo '<script>alert("Quote updated Successfully.....");</script>';
                echo '<script>setTimeout( function(){ window.location.href = "./motive.php" ;}, 10);</script>';
                exit;
    
        }

    }
    else{
        if(!isset($_GET['id'])){
            unset($_SESSION['uflag']);
            header("Location:./motive.php");
            exit;
        }
        $s="SELECT * FROM quotes WHERE qid = ".$_GET['id'];
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error while getting quotes of user");
            exit;
        }
        $r=mysqli_fetch_array($r);
        $_SESSION['uflag']=True;
        $_SESSION['id']=$_GET['id'];
        $_SESSION['data']=$r[2];
        print_r($_SESSION);
        header("Location:./motive.php");
}

?>