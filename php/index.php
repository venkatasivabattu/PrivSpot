<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./../css/login.css">
</head>
<body>
   <div class="login-container">
        <form action="index.php" method="POST">
            <center><span><h3>PrivSpot</h3></span></center>
            Username<br><input type="text" name="uname"><br>
            Password<br><input type="password" name="pword"><br>
            <input type="submit" value="Login" class='submit'>
            <p>Don't you have account? <a  href="register.php">Sign Up</a></p>
        </form>
   </div>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $u=$_POST['uname'];
        $p=$_POST['pword'];
        
        if($u==''||$p==''||$u==NULL||$p==NULL){
            echo "<script>alert('Please fill all cells');</script>";
            exit;

        }
        $con=mysqli_connect("localhost","root","","privdb");
        if(!$con){
            echo "<script>alert('DB not connected');</script>";
            exit;
        }
        $sql="SELECT name, password FROM users WHERE uname = '".$u."'";
        echo '<script>console.log("'.$sql.'");</script>';
        $r=mysqli_query($con,$sql);
        if($r){
            echo '<script>console.log("'.mysqli_num_rows($r).'");</script>';
            if(mysqli_num_rows($r)==0){
                echo '<script>alert("Invalid Username");</script>';
                exit;

            }
            $f=0;
            $name='';
            while($i=mysqli_fetch_array($r)){
                if($i['password']==$p){
                    $f=1;
                    $name=$i['name'];
                    break;
                }
            }
            echo '<script>console.log("'.$f.'");</script>';
            if($f==1){
                
                echo '<script>alert("welcome '.$name.'");</script>';
                echo '<script>setTimeout( function(){ window.location.href = "home.php" ;}, 10);</script>';
                exit;

            }
            else{
                echo '<script>alert("Invalid Password");</script>';
                

            }
        }
        else{
            echo '<script>console.log("Error while fetching data");</script>';
        }

    }
?>