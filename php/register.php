<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./../css/register.css">
</head>
<body>
    <form action="register.php" method="post">
        <center><span><h3>PrivSpot</h3></span></center>
        <div class="form-container">
            <div class="fci">
                <label>Name</label><input type="text" name="name" placeholder='eg:John' value="<?= (isset($_POST['name']) ? $_POST['name'] : '');?>" required>
                <label>Date of Birth</label><input type="date" name="dob" value=<?= (isset($_POST['dob']) ? $_POST['dob'] : '');?> required>
                <label>Gender</label>
                <div class="gender">
                    <section><input type="radio" name="gender" value="male"> Male</section>
                    <section><input type="radio" name="gender" value="female"> Female</section>
                    <section><input type="radio" name="gender" value="others"> Others</section>
                </div>
                <label>Address</label><input type="text" name="address" placeholder="eg:1-40e,main street,alapadu,324222" value="<?= (isset($_POST['address']) ? $_POST['address'] : ''); ?>">
                <label>Mobile</label><input type="tel" name="phone"  placeholder="eg:913443552562" value="<?= (isset($_POST['phone']) ? $_POST['phone'] : ''); ?>">
            </div>
            <div class="fci">
                <label>Email</label><input type="email" name="email" placeholder="eg:abc@yahoo.com" value="<?= (isset($_POST['email']) ? $_POST['email'] : ''); ?>">
                <label>Username</label><input type="text" name="uname" placeholder="eg:johnvictor" value="<?= (isset($_POST['uname']) ? $_POST['uname'] : ''); ?>" required>
                <label>Password</label><input type="password" name="password" value="<?= (isset($_POST['password']) ? $_POST['password'] : ''); ?>" required>
                <label>Confirm password</label><input type="password" name="check" value="<?= (isset($_POST['check']) ? $_POST['check'] : ''); ?>" required/>
                
            </div>
        </div>
        <center><input type="submit" value="Create Account" class="submit"></center>
    </form>
</body>
</html>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $n=$_POST['name'];
        $d=$_POST['dob'];
        $g=$_POST['gender'];
        $a=$_POST['address'];
        $p=$_POST['phone'];
        $e=$_POST['email'];
        $u=$_POST['uname'];
        $pw=$_POST['password'];
        $chk=$_POST['check'];
        
        
        if(strlen($u)<=7 or strlen($pw)<=7){
            echo '<script>alert("Username and password should have above 8 characters");</script>';
            
        }
        else{
            if($pw!=$chk){
                echo '<script>alert("Passwords are not matched");</script>';

            }
            else{
                //connect to db
                $con=mysqli_connect("localhost","root","","privdb");
                if(!$con){
                    echo '<script>console.log("Passwords are not matched");</script>';


                }
                else{
                    //check if any username exists
                    $sql="SELECT * FROM users WHERE uname='".$u."'";
                    echo '<script>console.log("'.$sql.'");</script>';
                    $r=mysqli_query($con,$sql);
                    if(!$r){
                        echo '<script>console.log("cant select the data");</script>';
                    }
                    else{
                        if(mysqli_num_rows($r)>0){
                            echo '<script>alert("Username exists!!..lease select other username");</script>';
                        }
                        else{
                            //happy insertion
                            echo '<script>console.log("happy insertion");</script>';
                            $sql="INSERT INTO users (name, dob, gender, address, phone, email, uname, password ) VALUES ( '".$n."', '".$d."', '".$g."', '".$a."', ".$p.", '".$e."', '".$u."', '".$p."')";
                            echo '<script>console.log("'.$sql.'");</script>';
                            if($r=mysqli_query($con,$sql)){
                                if(mysqli_affected_rows($con)){
                                    echo '<script>alert("Account created successfully......please Login!!");</script>';
                                    echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 10);</script>";
                                    exit;
    exit;
                                }
                                else{
                                    echo '<script>console.log("insertion not occured");</script>';
                                }

                            }else{
                                echo '<script>console.log("insertion query not executed");</script>';
                            }
                        }
                    }

                }
                
            }
        }
        

    }
?>