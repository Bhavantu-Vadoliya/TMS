<?php
session_start();
if(isset($_SESSION['unm']))
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TMS | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <?php include_once('includes/style.php');
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include_once('includes/header.php');
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once('includes/sidebar.php');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item"><a href="category.php">Categories</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
               include_once('includes/config.php');
               $id = $_REQUEST['id'];
               $qry="select * from categories where id=$id";
               $result = mysqli_query($con,$qry) or exit("category select fail".mysqli_error($con));
               $row=mysqli_fetch_array($result);
               ?>
              <form action="category_edit_db.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="cname" id="exampleInputEmail1" placeholder="Name" value="<?php echo $row["cat_name"];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="catdescription"  class="form-control" id="catdescription"><?php echo $row['cat_desc'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">old images</label>
                    <input type="hidden" name="oldimages" value="<?php echo $row ['cat_image'];?>">
                    <img src="../images/category/<?php echo $row ['cat_image'];?>" alt="" width="150px">

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');
?>   
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include_once('includes/script.php');
?>
</body>
</html>

<?php
if(isset($_SESSION['upd']))
{?>
    <script>alert("Category Update Failed")</script>          
    <?php
    unset($_SESSION['upd']);
}
?>
<?php
}
else{
  $_SESSION['error'] = "You are not authorised to access this";
  header("location:index.php");
}
?>
