<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrivSpot</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/todo/todo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar">
        <img src="../../images/logo.png" width="350px" height="150px">
        <ul class="items">
            <li><a href="../home.php"><i class="fa fa-bars" aria-hidden="true"></i>  Dashboard</a></li>
            <li><a href="../dairy/dairy.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> DiaryEntry</a></li>
            <li><a href="../notes/notes.php"><i class="fa fa-pencil-square" aria-hidden="true"></i> Notes</a></li>
            <li><a href=""><i class="fa fa-list-alt" aria-hidden="true"></i> Todo</a></li>
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
                <h3>To Do List</h3>
                <div class="ops">
                    <form action="todo.php" method="post">
                    <button type="submit" class="view-all-btn" id="viewall">
                        <i class="fa fa-eye" aria-hidden="true"></i> View All
                        </button>
                    </form>
                    <button onclick="cancel()" style="display:none" id="cancel">Cancel</button>
                    <button onclick="addTodo()" ><i class="fa fa-plus-square" aria-hidden="true"></i> Add ToDo</button>
                </div>
                <div class="result">
                    <?php
                    
                    include '../errorhandler.php';
                    session_start();
                    $con=mysqli_connect("localhost","root","","privdb");
                    $u=$_SESSION['uname'];
                    if(!$con){
                        echo "<script>alert('DB not connected');</script>";
                        exit;
                    }
                    $r='';
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        echo '<script>canceltrigger();
                        function canceltrigger(){
                            document.getElementById("viewall").style.display="none";
                            document.getElementById("cancel").style.display="block";
                        }</script>';
                        $sql='SELECT * FROM todo WHERE uname = "'.$u.'" ORDER BY date ASC';
                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            print("error in post");
                            exit;
                        }

                    }else{
                        $sql='SELECT * FROM todo WHERE uname = "'.$u.'" AND status = false ORDER BY date ASC';

                        $r=mysqli_query($con,$sql);
                        if(!$r){
                            print("error");
                            exit;
                        }

                    }
                    if(mysqli_num_rows($r)<1){
                        echo '<div class="nodata"><img src="../../images/todo/nd.gif" id="nodata"><p><b>No Tasks To do!!</b></p></div>';
                    }
                    else{
                        while($l=mysqli_fetch_array($r)){
                            echo '<div class="item"><div class="task">'.$l[1].'</div><div class="ops2">';
                            if($l[3]==TRUE){
                                    echo '<a href="./tdelete.php?id='.$l[0].'" id="del"><i class="fa fa-trash" aria-hidden="true"></i></a>';
                            }
                            else{
                                echo '<a href="./marktodo.php?id='.$l[0].'" id="mark"><i class="fa fa-check-square-o" aria-hidden="true"></i> Mark as Done</a>';

                            }
                            echo '</div></div>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="item2">
                <div class="form" id="todo">
                    <center><h3>Add To-do</h3></center>
                    <span id="x"><button onclick="addcloser()">X</button></span>
                    <form action="tentry.php" method="post">
                        <center><textarea name="task" placeholder="Write Your Task here........." rows="20" cols="37" required></textarea></center>
                        <center><input type="submit" value="Post"></center>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        function cancel(){
        // Your code for the cancel function here
            document.getElementById("viewall").style.display="block";
            document.getElementById("cancel").style.display="none";
            window.location.href="";
        }

        function addTodo(){
            // Your code for the addTodo function here
            document.getElementById("todo").style.display="block";
            
        }
        function addcloser(){
            // Your code for the addTodo function here
            document.getElementById("todo").style.display="none";
            
        }
    </script>
</body>
</html>
<?php
if(isset($_GET['f'])){
    if($_GET['f']==1){
        echo '<script>
        addTodo();
    </script>';
    }
}
?>
