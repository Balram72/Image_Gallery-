<?php
  include('conn.php');
  $id = $_GET['imgid'];

  if(isset($_POST['update'])){
     $name = $_POST['name'];
     $file = $_FILES['img']['name']; 


     $q = "select * from data where id=$id";
     $res = mysqli_query($con,$q);
     while($row = mysqli_fetch_array($res)){
         $oldpath =  $row['img'];
     }

      $directory = 'Image/'.$file; 
      $sql = "UPDATE data SET name = '$name', img = '$directory' WHERE id = $id ";
      $result = mysqli_query($con,$sql) or die("query is not Insert");

       
    if($result){
              unlink($oldpath);
              move_uploaded_file($_FILES['img']['tmp_name'],"$directory");  
              header("location:index.php");
    }
  }
  


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-3">
    <h2>Image Tabel</h2>
      <div class="card pt-4 ml-4" >
        <form action="" method="post" enctype="multipart/form-data">
        <?php
                 $id = $_GET['imgid'];

                $sql = "select * from data where id='$id'";
                 $result = mysqli_query($con,$sql);
                 while ($row = mysqli_fetch_array($result)){
           ?>
          <div class="form-group" style="padding-left:30px; padding-right:20px">
            <label for="Name">Name</label>
            <input type="name" class="form-control" id="name" value="<?php  echo $row['name'] ?>" placeholder="Enter name" name="name">
          </div>
          <div class="form-group" style="padding-left:30px;padding-right:20px" >
          <label for="img">OldImage</label>
                  <img src="<?php echo $row['img'] ?>" alt="No Image" style="Width:100px" >
           </div>
          <div class="form-group" style="padding-left:30px;padding-right:20px" >
            <label for="img">Image</label>
            <input type="file" class="form-control" id="img" placeholder="Enter Image" name="img" >
          </div>
          <?php
                 }
          ?>
          <button type="submit" name="update" class="btn btn-secondary mt-3 mb-3"  style="float:right;margin-right:20px">Submit</button>
        </form>
      </div>
  </div>
 </body>
</html>

