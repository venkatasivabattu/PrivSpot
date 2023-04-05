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
                        
                        
                        $sql="DELETE FROM dairy WHERE did = ".$did;
                        $r=mysqli_query($con,$sql);
                        if(mysqli_affected_rows($con)){
                            echo '<script>alert("Successfully Deleted......");</script>';
                            echo '<script>setTimeout(function(){ window.location.href="dairy.php"; } , 5);</script>';
                        }
                        else{
                            echo '<script>console.log("error while deleting dairy");</script>';
                        }
                        

                    }else{
                        header("Location:./../index.php");
                        exit;
                    }
                    
                ?>