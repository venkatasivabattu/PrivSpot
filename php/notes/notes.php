<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot/notes</title>
    <link rel="stylesheet" href="./../../css/notes/notes.css">
    <link rel="stylesheet" href="./../../css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <img src="./../../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href="../dairy/dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
            <li><a href=""><i class="fa fa-pencil-square" aria-hidden="true"></i> Notes</a></li>
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
            <div class="item1">
                <div class="search">
                    <form action='notes.php' method='post'>
                        <input type="search" name="search" value='<?= (isset($_POST['search']) ? $_POST['search'] : '') ?>' placeholder="eg:title of notes" id="input" required>
                    <?php 
                    session_start();
                    $con=mysqli_connect("localhost","root","","privdb");
                    $u=$_SESSION['uname'];
                    if(!$con){
                        echo "<script>alert('DB not connected');</script>";
                        exit;
                    }
                    
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        echo '</form><button><a href="notes.php" id="button">Cancel</a></button></div>';
                        $t=$_POST['search'];
                        $sql='SELECT * FROM notes WHERE uname = "'.$u.'" AND title = "'.$t.'" ORDER BY date DESC';
                        $r=mysqli_query($con,$sql);
                        echo "<div class='result'>";
                        
                        if(mysqli_num_rows($r)<=0){
                            echo '<div class="nodata">
                            <marquee><p><b>Oops!! No Notes Found!</b></p></marquee></div>';

                        }
                        else{
                            while($l=mysqli_fetch_array($r)){
                                echo "<script>console.log('".$l['title']."');</script>";
                                echo '<div class="data">
                                        <div class="d1">
                                            <div class="title"><h3>'.$l['title'].'</h3></div>
                                            <div class="ops"><a href="./nview.php?id='.$l["nid"].'"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="./nupdate.php?id='.$l["nid"].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="./ndelete.php?id='.$l["nid"].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="d2"><p>'.$l['data'].'</p></div>
                                      </div>';
                                

                            }
                        }
                        


                    }
                    else{
                        echo '<input type="submit" value="Search" ></form></div>';
                        $sql='SELECT * FROM notes WHERE uname = "'.$u.'" ORDER BY date DESC';
                        $r=mysqli_query($con,$sql);
                        echo "<div class='result'>";
                        if(mysqli_num_rows($r)<=0){
                            echo '<div class="nodata">
                            <marquee><p><b>Oops!! No Notes Found!</b></p></marquee></div>';

                        }
                        else{
                            while($l=mysqli_fetch_array($r)){
                               
                                echo '<div class="data">
                                        <div class="d1">
                                            <div class="title"><h3>'.$l['title'].'</h3></div>
                                            <div class="ops"><a href="./nview.php?id='.$l["nid"].'"><i class="fa fa-eye" aria-hidden="true"></i></a><a href="./nupdate.php?id='.$l["nid"].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="./ndelete.php?id='.$l["nid"].'"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="d2"><p>'.$l['data'].'</p></div>
                                      </div>';
                                

                            }
                        }
                        
                    }

                    ?>
                
                </div> 
            </div>
            <div class="item2">
                <center><h3>Add New Notes</h3></center>
                <div class="form">
                   <center> <form action="nentry.php" method="post">
                        <input type="text" name="title" placeholder="   eg:title1" id="t">
                        <textarea rows="21" cols="20" name="data" placeholder="note point1: " id="d" required></textarea>
                        <input type="submit" value="Save" id="s">
                        
                </form>
                </center>
                </div>
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