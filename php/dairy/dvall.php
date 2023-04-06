<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot/ViewAllDairies</title>
    <link rel="stylesheet" href="./../../css/navbar.css">
    <link rel="stylesheet" href="./../../css/dairy/dvall.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <img src="./../../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href="dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
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
        <div class="content">
            <div class="container">
            <?php 

                session_start();
                $con=mysqli_connect("localhost","root","","privdb");
                if(!$con){
                    echo "<script>alert('DB not connected');</script>";
                    exit;
                }
                $u=$_SESSION['uname'];
                
                $t="SELECT DISTINCT YEAR(date) AS year FROM dairy WHERE uname = '".$u."' ORDER BY year DESC";
                $r=mysqli_query($con,$t);
                while($l=mysqli_fetch_array($r)){
                    echo '<script>console.log("'.$l['year'].'")</script>';
                    echo '<div class="item">';
                    echo '<center><h3>'.$l['year'].'</h3></center>';
                    
                    $s="SELECT * FROM dairy WHERE uname = '".$u."' AND YEAR(date) = '".$l['year']."' ORDER BY date DESC";
                    $r2=mysqli_query($con,$s);
                    echo '<div class="table"><table><tbody>';
                    while($d=mysqli_fetch_array($r2)){
                        echo '<script>console.log("'.$d['date'].'")</script>';
                        echo '<tr><td>'.date('l, F jS Y',strtotime($d['date'])).'</td><td><button><a href="./dview.php?id='.$d["did"].'">View</a></button><button><a href="./dupdate.php?id='.$d["did"].'">Edit</a></button><button><a href="./ddelete.php?id='.$d["did"].'">Delete</a></button></td></tr>';

                    }
                    echo '</tbody></table></div>';

                    echo '</div>';
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