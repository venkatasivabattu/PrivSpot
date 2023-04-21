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
        $d='';
        $id=$_POST['id'];
        $u=$_SESSION['uname'];
        if(isset($_POST['title'])){
            $t=$_POST['title'];
        }
        if(isset($_POST['data'])){
            $d=$_POST['data'];
        }
        $s="SELECT title FROM notes WHERE nid = ".$id;
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error while getting title for id checking");
            exit;
        }
        $r=mysqli_fetch_array($r);
        //checking if the title is changed
        if($t!=$r[0]){
            print(1);
            $s="SELECT * FROM notes WHERE uname = '".$u."' AND title = '".$t."'";
            $r=mysqli_query($con,$s);
            //checking if the title is already there
            if(mysqli_num_rows($r)!=0){
                $p=$t.'(_%)';
                $s="SELECT * FROM notes WHERE uname = '".$u."' AND title like '".$p."' ORDER BY title DESC ";
                print($s);
                $r=mysqli_query($con,$s);
                print(mysqli_num_rows($r));
                //if no matches found that means first()
                if(mysqli_num_rows($r)==0){
                    $t=$t.'(1)';
                }
                else{
                    //if matches found
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
                    }
                    else{
                        //some value is there
                            $l=(int)$l;
                            $l+=1;
                            $t=$t.'('.$l.')';
                    }
                }

            }
        }
        print("everything cleared");
        print($t);
        $date = date('Y-m-d H:i:s');
        echo "<script>console.log('".$date."');</script>";
        $s="UPDATE notes SET title = '".$t."' , data = '".$d."' , date = '".$date."'  WHERE nid =".$id;
        $r=mysqli_query($con,$s);
        if(!$r){
            print("error while updating notes");
            exit;
        }
        else{
            echo '<script>alert("Notes Saved Successfully.....");</script>';
            echo '<script>setTimeout( function(){ window.location.href = "./notes.php" ;}, 10);</script>';
            exit;
        }
        
    }
?>