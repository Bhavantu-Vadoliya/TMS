 <!-- leave_delete.php -->
<?php
session_start();
if(isset($_SESSION['mail']))
{
    include_once('includes/config.php');
    $id=$_REQUEST['l_id'];
    $qry = "Delete from leaves where l_id=$id";
    mysqli_query($con,$qry) or exit("task Delete fail".mysqli_error($con));
    $_SESSION['del']="Deleted...";
    echo "<script type='text/javascript'> alert('Leave Deleted successfully');
    window.location.href = 'Leave_status.php';
    </script>";
}
else{   
    $_SESSION['error']="your are not authorize to access this page without login";
    echo "<script type='text/javascript'> alert('Task Creation Failed!!');
    window.location.href = 'Leave_status.php';
    </script>";
}
?>