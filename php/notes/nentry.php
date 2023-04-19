<?php 
session_start();
if(count($_SESSION)<1){
    header("Location:./../index.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $con=mysqli_connect("localhost","root","","privdb");
    $u=$_SESSION['uname'];
    if(!$con){
        echo "<script>alert('DB not connected');</script>";
        exit;
    }
    $t='';
    if(isset($_POST['title'])){
        if(strlen($_POST['title'])==0){
            $t=date('l, F jS Y');
        }
        else{
        $t=$_POST['title'];
        }

    }else{
        $t=date('l, F jS Y');
        

    }
    echo "<script>console.log('".$t."');</script>";
    $s="SELECT * FROM notes WHERE uname = '".$u."' AND title = '".$t."'";
    $r=mysqli_query($con,$s);
    $d=$_POST['data'];
    $flag=0;
    if(mysqli_num_rows($r)==0){
        $s="INSERT INTO notes ( title, data , uname ) VALUES ( '".$t."', '".$d."', '".$u."')";
        $r=mysqli_query($con,$s);
        if(!$r){
            echo "<script>console.log('error notes entry ');</script>";
            exit;
        }
        $flag=1;

    }
    else{
            $p=$t.'(_%)';
            $s="SELECT * FROM notes WHERE uname = '".$u."' AND title like '".$p."' ORDER BY title DESC ";
            print($s);
            $r=mysqli_query($con,$s);
            print(mysqli_num_rows($r));
            //if no matches found that means first()
            if(mysqli_num_rows($r)==0){
                $t=$t.'(1)';
                $s="INSERT INTO notes ( title, data , uname ) VALUES ( '".$t."', '".$d."', '".$u."')";
                $r=mysqli_query($con,$s);
                if(!$r){
                    echo "<script>console.log('error notes entry ');</script>";
                    exit;
                }
                $flag=1;
            }
            else{
                    //matches found that means ()
                    $l=mysqli_fetch_array($r);
                    print_r('-------------------------'.$l['title']);
                    $l=explode('(',$l['title']);
                    $l=$l[1];
                    $l=explode(')',$l);
                    $l=$l[0];
                    print_r($l);
                    if(strlen($l)==0){
                        //if empty brace
                        $t=$t.'(1)';
                        $s="INSERT INTO notes ( title, data , uname ) VALUES ( '".$t."', '".$d."', '".$u."')";
                        $r=mysqli_query($con,$s);
                        if(!$r){
                            echo "<script>console.log('error notes entry ');</script>";
                            exit;
                        }
                        $flag=1;
                    }
                    else{
                        $l=(int)$l;
                        $l+=1;
                        $t=$t.'('.$l.')';
                        $s="INSERT INTO notes ( title, data , uname ) VALUES ( '".$t."', '".$d."', '".$u."')";
                        $r=mysqli_query($con,$s);
                        if(!$r){
                            echo "<script>console.log('error notes entry ');</script>";
                            exit;
                        }
                        $flag=1;
                                
                    }

                }
        }
        if($flag==1){
            
            echo '<script>alert("Notes Saved Successfully.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./notes.php" ;}, 10);</script>';
            exit;
        }

            
        
}
?>