<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot/dairy/dview</title>
    <link rel="stylesheet" href="./../../css/navbar.css">
    <link rel="stylesheet" href="./../../css/dairy/dentry.css">
    <link rel="stylesheet" href="./../../css/dairy/dview.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
            <img src="./../../images/logo.png" width="350px" height="150px">
            <ul class="items">
                <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
                <li><a href="./dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
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
            <img src='./../../images/dairy/dentry/blank-page-spiral-bound-notebook-w68nyvbmkkpt7lqf.jpg' width="1148.2px" height="476px">
            
                <?php
                    
                    session_start();
                    if(count($_SESSION)>0){
                        $name=$_SESSION['name'];
                        $uname=$_SESSION['uname'];
                        $con=mysqli_connect("localhost","root","","privdb");
                        if(!$con){
                            echo "<script>alert('DB not connected');</script>";
                            exit;
                        }
                        if(isset($_GET['id'])){
                            $did=$_GET['id'];
                        }
                        else{
                            header("Location:dairy.php");
                            exit;
                        }
                        
                        $sql="SELECT * FROM dairy WHERE did = ".$did;
                        $r=mysqli_query($con,$sql);
                        if(mysqli_num_rows($r)>0){
                            $r=mysqli_fetch_array($r);
                            echo "<div class='form'><div class='date'><p><b>Date: </b>". date('jS F Y',strtotime($r['date']))."</p><p><b>Day: </b>".date("l",strtotime($r['date']))."</p></div><div class='data'>";

                            echo '<pre>',$r['data'].'</pre>';
                            echo '<button id="update"><a href="./dupdate.php?id='.$r["did"].'">Edit</a></button>';
                        }
                        else{
                            header("Location:dentry.php");
                            exit; 
                        }
                        
                        

                    }else{
                        header("Location:./../index.php");
                        exit;
                    }
                    
                ?>
                    
            </div>
           </div>

        </div>
    
</body>
</html>
