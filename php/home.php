<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot/home</title>
    <link rel="stylesheet" href="./../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <img src="./../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href=""><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href="./dairy/dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
            <li><a href="./notes/notes.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Notes</a></li>
            <li><a href="./todo/todo.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Todo</a></li>
            <li><a href="./motive/motive.php"><i class="fa fa-quora" aria-hidden="true"></i> Motive</a></li>
            <li><a href="./profile/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>

        </ul>

    </div>
    <div class="body">
        <div class="htmldivs">
            <div class="indiv">
                <div class="diary">
                    <button><a href="./dairy/dairy.php">Dairy Entry</a></button>
                </div>
                <div class="notes">
                    <button><a href="./notes/notes.php">Add Notes</a></button>
                </div>
            </div>
            <div class="indiv">
                <div class="todo">
                    <button><a href="./todo/todo.php?f=1">Add To-do</a></button>
                </div>
                <div class="motive">
                    <button><a href="./motive/motive.php?f=1">Add Motive</a></button>
                </div>
            </div>
        </div>
        <div class="phpdata">
            <div class="quote-container">
                <center><h3>A Line to Motivate</h3></center>
                <div class="quote-container-item">
                    <?php
                    include './errorhandler.php';
                    session_start();
                    if(!count($_SESSION)>0){
                       
                
                   
                        header("Location:index.php");
                        exit;
                    }
                        
                        $u=$_SESSION['uname'];
                        $con=mysqli_connect("localhost","root","","privdb");
                        if(!$con){
                            echo "<script>alert('DB not connected');</script>";
                            exit;
                        }
                        $_SESSION['con']=$con;
                        $sql="SELECT * FROM quotes WHERE uname = '".$u."'";
                        echo '<script>console.log("'.$sql.'");</script>';
                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            echo '<script>console.log("error while fetching quotes");</script>';
                            exit;
                            
                        }
                        echo '<script>console.log("'.mysqli_num_rows($r).'");</script>';
                        if(mysqli_num_rows($r)>0){
                            $quote=[];
                            while($i=mysqli_fetch_array($r)){
                                
                                $quote[$i['qid']]=$i['quote'];
                            }
                            
                            
                            $rn=array_rand($quote);
                            echo '<span id="yes-quote"> <p><i class="fa fa-quote-left" aria-hidden="true"></i> '.$quote[$rn].' <i class="fa fa-quote-right" aria-hidden="true"></i></p></span>';
                            
                        }
                        else{
                            echo "<span id='no-quote'><p><i class='fa fa-frown-o' aria-hidden='true' style='color:black'></i> Oops! No quotes Found <a href='./motive/motive.php?f=1'><i class='fa fa-hand-o-right' aria-hidden='true'></i>Add Quote</a></span>";
                        }
                        
                    ?>
                </div>
            </div>
            <div class="alert-container">
                <center><h3>To-Do Alert</h3></center>
                <div class="alert-container-item">
                    
                    <?php
                        $u=$_SESSION['uname'];
                        $con=mysqli_connect("localhost","root","","privdb");
                        if(!$con){
                            echo "<script>alert('DB not connected');</script>";
                            exit;
                        }
                        $sql="SELECT * FROM todo WHERE uname = '".$u."' AND status = false ORDER BY date ASC LIMIT 1";
                        
                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            echo '<script>console.log("error while fetching todo");</script>';
                            exit;
                            
                        }
                        if(mysqli_num_rows($r)>0){

                        
                            echo '<table><tbody>';
                            while($a=mysqli_fetch_array($r)){
                                echo '<tr><td><i class="fa fa-long-arrow-right" aria-hidden="true"></i></td><td><p>'.$a['task'].'</p></td><td><button onclick="marktodo('.$a['tid'].')">Mark as Done</button></td></tr>';
                                
                            }
                            echo '</tbody></table>';
                        }
                        else{
                            echo "<span id='no-todo'><p><i class='fa fa-frown-o' aria-hidden='true' style='color:black'></i> Oops! No tasks Found <a href='./todo/todo.php?f=1'><i class='fa fa-hand-o-right' aria-hidden='true'></i>Add a Task</a></span>";
                        }
                        
                    ?>
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
        header("Location:index.php");
        exit;
    }
    
?>
<script>
    function marktodo(id){
        console.log(id);
        window.location.href="./todo/marktodo.php?id="+id;
        
    }
</script>