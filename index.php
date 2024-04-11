<?php
  include('conn.php');
  if(isset($_POST['submit'])){
     $name = $_POST['name'];
     $fileCount = count($_FILES['img']['name']);

     for($i = 0; $i < $fileCount; $i++) {

          $fileName = $_FILES['img']['name'][$i];
          $tmpFilePath = $_FILES['img']['tmp_name'][$i];
          $directory = 'Image/' . $fileName;
  
          $sql = "insert into data values('','$name','$directory')";
          $result = mysqli_query($con,$sql) or die("query is not Insert");
          if($result){
                  move_uploaded_file($tmpFilePath, $directory);
                  header("location:index.php");
          }
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
          <div class="form-group" style="padding-left:30px; padding-right:20px">
            <label for="Name">Name</label>
            <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" required>
          </div>
          <div class="form-group" style="padding-left:30px;padding-right:20px" >
            <label for="img">Image</label>
            <input type="file" class="form-control" id="img" placeholder="Enter Image" name="img[]" multiple required>
          </div>
          <button type="submit" name="submit" class="btn btn-secondary mt-3 mb-3"  style="float:right;margin-right:20px">Submit</button>
        </form>
      </div>
      <div class="container mt-3">
        <table class="table">
          <thead class="table-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $sql = "select * from data";
                 $result = mysqli_query($con,$sql);
                 while ($row = mysqli_fetch_array($result)){
                ?>
                  <tr>
                    <th scope="row"><?php echo $row['id']; ?></th>
                    <td> <?php echo $row['name'] ?></td>
                    <td><img src="<?php echo $row['img']; ?>" alt="NoImage" style="width:30px"> </td>
                    <td>
                       <button type="button" class="btn btn-danger">
                          <a href="deleteimge.php?imgid=<?php echo $row['id']; ?>" class="link-dark" style="text-decoration:none;">Delete</a>
                       </button>  
                       <button type="button" class="btn btn-info">
                          <a href="update.php?imgid=<?php echo $row['id']; ?>" class="link-dark" style="text-decoration:none;">Update</a>
                       </button>  
                    </td>  
                  </tr>
                <?php
                 }
             ?>
          </tbody>
        </table>
      </div>
  </div>
 </body>
</html>

