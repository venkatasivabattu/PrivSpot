<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/profile/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="navbar">
        <img src="../../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href="../dairy/dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
            <li><a href="../notes/notes.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Notes</a></li>
            <li><a href="../todo/todo.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Todo</a></li>
            <li><a href="../motive/motive.php"><i class="fa fa-quora" aria-hidden="true"></i> Motive</a></li>
            <li><a href=""><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
            <li><a href="../logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>

        </ul>

    </div>
    <div class="body">
        <div class="content">
            <div class="set">
                    <div class="del" id="del">
                        <a href="adelete.php"><i class="fa fa-trash" aria-hidden="true"></i> Delete My Account</a>
                    </div>
            </div>
<?php
    session_start();
    $con=mysqli_connect("localhost","root","","privdb");
    if(!$con){
        print("db connection error");
        exit;
    }
    
    
    if($_SERVER['REQUEST_METHOD']!='POST'){
        $s="SELECT * FROM users WHERE uname = '".$_SESSION['uname']."'";
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error in fetching user");
            exit;
        }
        $r=mysqli_fetch_array($r);
        $_SESSION['name']=$r['name'];
        $_SESSION['dob']=$r['dob'];
        $_SESSION['mobile']=$r['phone'];
        $_SESSION['email']=$r['email'];
        $_SESSION['gender']=$r['gender'];
        $_SESSION['address']=$r['address'];

    }
    
?>
            <center>
            <div class="form">
            <center>
                <h3>User Information</h3><br>
                <i class="fa fa-user-circle-o fa-5x" aria-hidden="true"></i>
                <form action="profile.php" method="post">
                    <span class="field">
                        <span class="i1">
                            Full Name: 
                        </span>
                        <span class="i2">
                            <input type="text" name="name" required value="<?= (isset($_POST['name'])?$_POST['name']:(isset($_SESSION['name'])?$_SESSION['name']:'')) ?>">
                        </span>
                   </span>
                    <span class="field">
                    <span class="i1">
                        UserName: 
                        </span>
                        <span class="i2"><input type="text" name="uname" value="<?= (isset($_POST['uname'])?$_POST['uname']:(isset($_SESSION['uname'])?$_SESSION['uname']:'')) ?>"  required>
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Date of Birth:
                        </span>
                        <span class="i2"> <input type="date" name="dob" value="<?= (isset($_POST['dob'])?$_POST['dob']:(isset($_SESSION['dob'])?$_SESSION['dob']:'')) ?>">
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Gender: 
                        </span>
                        <span class="i2"><input type="radio" name="gender" value="male" required 
                        <?php if((isset($_SESSION['gender']) && $_SESSION['gender']=='male') or (isset($_POST['gender']) && $_POST['gender']=='male')) echo 'checked'; ?>> Male
                        <input type="radio" name="gender" value ="female" required <?php if((isset($_SESSION['gender']) && $_SESSION['gender']=='female') or (isset($_POST['gender']) && $_POST['gender']=='female')) echo 'checked'; ?> > Female
                        <input type="radio" name="gender" value="others"  <?php if((isset($_SESSION['gender']) && $_SESSION['gender']=='others') or (isset($_POST['gender']) && $_POST['gender']=='others')) echo 'checked'; ?> > Others
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Mobile:
                        </span>
                        <span class="i2"> <input type="tel" name="mobile" value="<?= (isset($_POST['mobile'])?$_POST['mobile']:(isset($_SESSION['mobile'])?$_SESSION['mobile']:'')) ?>">
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Email: 
                        </span>
                        <span class="i2"><input type="email" name="email" value="<?= (isset($_POST['email'])?$_POST['email']:(isset($_SESSION['email'])?$_SESSION['email']:'')) ?>">
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Address: 
                        </span>
                        <span class="i2"><input type="text" name="address" value="<?= (isset($_POST['address'])?$_POST['address']:(isset($_SESSION['address'])?$_SESSION['address']:'')) ?>">
                    </span></span>
                    <span class="field">
                    <span class="i1">
                        Password:
                        </span>
                        <span class="i2"> <input type="password" name="pw" placeholder="Blank to leave unchange" value="<?= (isset($_POST['pw'])?$_POST['pw']:'') ?>">
                    </span></span><span class="field">
                    <span class="i1">
                        Confirm Password:
                        </span>
                        <span class="i2"> <input type="password" name="cpw" value="<?= (isset($_POST['cpw'])?$_POST['cpw']:'') ?>"></span>
                    </span>
                    
                    <span class="field">
                    <span class="i1">
                    <input type="submit" value="Update" id="submit">
                        </span>
                        <span class="i2"> or <a href="../home.php" id="a">Cancel</a>
                    </span></span>

                    
                </form>
            </center>
            </div>
            </center>
            
        </div>
    </div>
</body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    $sql=' UPDATE users SET ';
    //checking full name
    $name=(isset($_POST['name'])?$_POST['name']:'');
    $ualert=0;
    $sf=0;
    if(strlen($name)<1){
        echo '<script>alert("Please enter Valid Name");</script>';
        exit;
    
    }
    $sql.='name = "'.$name.'" ';
    
    //check username
    $uname=(isset($_POST['uname'])?$_POST['uname']:'');

    if($uname!=$_SESSION['uname']){
        $s="SELECT * FROM users WHERE uname='".$uname."'";
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error in fetching user");
            exit;
        }
        if(mysqli_num_rows($r)>0){
            echo '<script>alert("Username Already Exists");</script>';
            exit;
        } else{
            $ualert=1;
        }
    }
    $sql.=' , uname = "'.$uname.'" ';

    //check dob
    $dob=(isset($_POST['dob'])?$_POST['dob']:'');
    if(date('y m d',strtotime($dob)) > date('y m d')){
        echo '<script>alert("Please Enter Valid Date Of Birth");</script>';
        exit;
    } 
    $sql.=' , dob = "'.$dob.'" ';
    $sf=0;
    $gender=(isset($_POST['gender'])?$_POST['gender']:'');
    if(strlen($gender)>0){
        $sql.=' , gender = "'.$gender.'" ';
    }
    
    $mobile=(isset($_POST['mobile'])?$_POST['mobile']:' ');
    if(strlen($mobile)>0){
        $sql.=' , phone = "'.$mobile.'" ';
    }
    else{
        $sql.=' , phone = "" ';
    }

    $email=(isset($_POST['email'])?$_POST['email']:'');
    if(strlen($email)>0){
        $sql.=' , email = "'.$email.'" ';
    }
    else{
        $sql.=' , email = "" ';
    }
    $address=(isset($_POST['address'])?$_POST['address']:'');
    if(strlen($address)>0){
        $sql.=' , address = "'.$address.'" ';
    }
    else{
        $sql.=' , address = "" ';
    }

    $pw=(isset($_POST['pw'])?$_POST['pw']:'');   
    if(strlen($pw)>0){
        $cpw=(isset($_POST['cpw'])?$_POST['cpw']:'');
        if(strlen($pw)>=8){
            if($pw==$cpw){
                $sql.= ' , password = "'.$pw.'"  WHERE uname = "'.$_SESSION['uname'].'"';
                $r=mysqli_query($con,$sql);
                if(!$r){
                    print("error in updating user with pw");
                    print($sql);
                    exit;
                }
                else{
                    echo '<script>alert("Profile updated successfully.....");</script>';
                    $sf=1;

                }


            }
            else{
                echo '<script>alert("Passwords are not matching..");</script>';
                exit;

            }
            

        }
        else{
            echo '<script>alert("Password should be above 8 characters.....");</script>';
            exit;

        }
        
    }
    
    else{
        $sql.='  WHERE uname = "'.$_SESSION['uname'].'"';
        $r=mysqli_query($con,$sql);
        if(!$r){
            print("error in updating user without pw");
            print($sql);
            exit;
        }
        else{
            echo '<script>alert("Profile updated successfully.....");</script>';
            $sf=1;

        }

    }


    
    if($sf==1){
    
        if($ualert==1){
            $_SESSION['uname']=$uname;
        }
        
       
    }



}


?>
<script>
    function delfun(){
        document.getElementById("del").style.display = "block";
    }
</script>