<?php
 session_start();
 include('admin/includes/config.php');
 if($con)
 {
    extract($_POST);
    $qry = mysqli_query($con,"INSERT INTO admin VALUES (NULL,'".$name."' , '".$email."' , '".md5($password)."');");
    if($qry)
    {  
        echo "<script type='text/javascript'> alert('Manager Added successfully');
        window.location.href = 'index.php';
        </script>";
    }else{
        echo "Errorrrrr";
    }
 }else{
    echo"Error";
 }
?>