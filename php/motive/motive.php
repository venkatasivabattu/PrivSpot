<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/motive/motive.css">
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
            <li><a href=""><i class="fa fa-quora" aria-hidden="true"></i> Motive</a></li>
            <li><a href="../profile/profile.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
            <li><a href="../logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>
            <li id="case"><a href="">jnjjj</a></li>

        </ul>

    </div>
    <div class="body">
        <div class="content">
            <div class="i1">
                <center><button onclick="funbut1()" id="add"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Quote</button></center>
                <div id="i1">
                    <center>
                        <h3>Add Quote</h3>
                        <span id="x"><button onclick="funbut2()">X</button></span>
                        <form action="mentry.php" method="post">
                            <textarea name="quote" rows="20" cols="32" placeholder="Write your quote here......" required></textarea>
                            <input type="submit" value="Post">
                        </form>
                </center>
                </div>
            </div>
            <div class="i2">
                <div class="search">
                    <form action='motive.php' method='post'>
                        <input type="search" name="search" value='<?= isset($_POST['search']) ? $_POST['search'] : (isset($_SESSION['search']) ? $_SESSION['search'] : '') ?>' placeholder="eg:title of notes" id="input" required>
                    <?php 
                    
                    if(isset($_GET['f'])){
                        if($_GET['f']==1){
                            echo '<script>
                            document.getElementById("add").style.display = "none";
                            document.getElementById("i1").style.display = "block";
                        </script>';
                        }
                    }
                    
                    include '../errorhandler.php';
                    session_start();
                    $con=mysqli_connect("localhost","root","","privdb");
                    $u=$_SESSION['uname'];
                    if(!$con){
                        echo "<script>alert('DB not connected');</script>";
                        exit;
                    }
                    if($_SERVER['REQUEST_METHOD']=='POST' or isset($_SESSION['search'])){
                        echo '</form><button id="button" onclick="cancelfun()">Cancel</button></div>';
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $sr=$_POST['search'];  
                            $_SESSION['search']=$sr;

                        }
                        else{
                            $sr=$_SESSION['search'];
                        }
                       
                        $sql='SELECT * FROM quotes WHERE uname = "'.$u.'" AND quote LIKE "%'.$sr.'%"';
                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            print("error");
                            exit;
                        }
                        echo "<div class='result'>";
                        if(mysqli_num_rows($r)<=0){
                            echo '<div class="nodata">
                            <img src="../../images/motive/nodata.gif"></div>';

                        }
                        else{
                            while($l=mysqli_fetch_array($r)){
                               
                                echo '<div class="item"><div class="quote">'.$l[2].'</div><div class="ops1"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></div><div class="ops2"><button onclick="updatefun('.$l[0].')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button onclick="delfun('.$l[0].')"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>';

                            }
                        }
                        echo '</div>';
                        
                    }
                    else{
                        unset($_SESSION['search']);
                        echo '<input type="submit" value="Search" ></form></div>';
                        $sql='SELECT * FROM quotes WHERE uname = "'.$u.'"';
                        $r=mysqli_query($con,$sql);
                        echo "<div class='result'>";
                        if(mysqli_num_rows($r)<=0){
                            echo '<div class="nodata">
                            <img src="../../images/motive/nodata.gif"></div>';

                        }
                        else{
                            while($l=mysqli_fetch_array($r)){
                               
                                echo '<div class="item"><div class="quote">'.$l[2].'</div><div class="ops1"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></div><div class="ops2"><button onclick="updatefun('.$l[0].')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><button onclick="delfun('.$l[0].')"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>';

                            }
                        }
                        echo '</div>';
                        
                 }

                    ?>
                
               
                
            </div>
            <div class="i3">
                <div id="i3">
                
                        <center>
                            <h3>Edit Quote</h3>
                            <span id="x"><button onclick="funbut3()">X</button></span>
                            <form action="mupdate.php" method="post">
                                <textarea name="quote" rows="20" cols="32" placeholder="Write your quote here......" required><?= (isset($_SESSION['data']))?$_SESSION['data'] : '' ?></textarea>
                                <input type="submit" value="Save">
                                <input type="number"  name="id" value="<?= (isset($_SESSION['id']))?$_SESSION['id'] : '' ?>" style="display:none">
                            </form>
                        </center>
                    <div id="s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function funbut1(){
        document.getElementById("add").style.display = "none";
        document.getElementById("i1").style.display = "block";
    }
    function funbut2(){
        document.getElementById("add").style.display = "block";
        document.getElementById("i1").style.display = "none";
    }
    function funbut3(){
        
       
        window.location.href="mupdate.php?";
        document.getElementById("i3").style.display = "none";

    }
    function updatefun(id){
     
            
     
        window.location.href="mupdate.php?id="+id;
        
        
    }
    function updatefun2(){
     
            
     document.getElementById("i3").style.display = "block";
     
     
     
    }
    function delfun(id){
        window.location.href="mdelete.php?id="+id;
     }
     function cancelfun(){
        
        window.location.href="mcancel.php";
     }
   
</script>
<?php
    
    if(count($_SESSION)<1){
        header("Location:./../index.php");
        exit;
    }
    if(isset($_SESSION['uflag'])){
        echo '<script>updatefun2();</script>';
    }

?>