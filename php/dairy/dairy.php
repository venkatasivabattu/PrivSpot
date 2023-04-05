<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot/dairyentry</title>
    <link rel="stylesheet" href="./../../css/dairy/dairy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <img src="./../../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
            <li><a href="../notes/notes.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Notes</a></li>
            <li><a href="../todo/todo.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Todo</a></li>
            <li><a href="../motive/motive.php"><i class="fa fa-quora" aria-hidden="true"></i> Motive</a></li>
            <li><a href="../profile/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
            <li><a href="../logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>

        </ul>

    </div>
    <div class="body">
        <div class="dairydiv">
            <div class="dcheck">
                <?php
                    session_start();
                    $u=$_SESSION['uname'];
                    $con=mysqli_connect("localhost","root","","privdb");
                    if(!$con){
                        echo "<script>alert('DB not connected');</script>";
                        exit;
                    }
                    $_SESSION['con']=$con;
                    $sql="SELECT * FROM dairy WHERE uname = '".$u."' AND date = CURDATE()";
                    echo '<script>console.log("'.$sql.'");</script>';
                    $r=mysqli_query($con,$sql);
                    if(!$r){
                        echo '<script>console.log("error while fetching quotes");</script>';
                        exit;
                        
                    }
                    echo '<script>console.log("'.mysqli_num_rows($r).'");</script>';
                    echo '<div class="date"><b>Today :</b>' . date('l, F jS Y') . '</div>';

                    if(mysqli_num_rows($r)==0){
                        echo '<div class="no-buttons"><button><a href="./dentry.php">Entry</a></button></div>';
                    }
                    else{
                        $r=mysqli_fetch_array($r);
                        echo '<div class="yes-buttons"><button><a href="./dview.php?id='.$r["did"].'">View</a></button><button><a href="./dupdate.php?id='.$r["did"].'">Edit</a></button><button><a href="./ddelete.php?id='.$r["did"].'">Delete</a></button></div>';
                    
                    }
                ?>
            </div>
           
            <div class="dsearch">
                <center><h3>Search Dairy</h3></center>
                <div class="form">
                    <form acion="dairy.php" method="post">
                        Select Date:<input type="date" name="date" value=<?= (isset($_POST['date']) ? $_POST['date'] : '') ?>  required>
                        <input type="submit" value="Search" id="search">
                        
                    </form>
                    <button id="all" ><a href="./dvall.php">View All dairies</a></button>
                </div>
                <?php
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        if(!isset($_POST['date']) or $_POST['date']==''){
                            exit;
                        }
                        echo '<script>console.log("hi");</script>';
                        
                        $d=$_POST['date'];
                        $sql="SELECT * FROM dairy WHERE uname = '".$u."' AND date = '".$d."'";
                        echo '<script>console.log("'.$sql.'");</script>';
                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            echo '<script>console.log("error while fetching quotes");</script>';
                            exit;
                            
                        }
                        echo '<script>console.log("'.mysqli_num_rows($r).'");</script>';
                        if(mysqli_num_rows($r)==0){
                            echo 
                            '<div class="nodairy">
                            </div>';
                        }
                        else{
                            echo 
                            '<div class="yesdairy">';
                            while($l=mysqli_fetch_array($r)){
                                echo '<div class="date"><b>Date :</b>' . date('l, F jS Y',strtotime($l['date'])) . '</div>';
                                echo '<div class="yes-buttons"><button><a href="./dview.php?id='.$l["did"].'">View</a></button><button><a href="./dupdate.php?id='.$l["did"].'">Edit</a></button><button><a href="./ddelete.php?id='.$l["did"].'">Delete</a></button></div>';
                    
                            }
                            echo '</div>';
                            
                        
                        }


                    }

                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
   
    
    if(count($_SESSION)>0){
        $name=$_SESSION['name'];
        $uname=$_SESSION['uname'];
        

    }else{
        header("Location:./../index.php");
        exit;
    }
    
?>