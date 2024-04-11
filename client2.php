
<?php include('conn.php'); ?>
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
    <h2 style="text-align:center"> Image Show</h2>
          <?php 
          $q = "select * from data";
          $query = mysqli_query($con,$q) or die('Data is not connected');
          $first = true;
          while($row = mysqli_fetch_array($query)){
            if($first){
            ?>
              <div class="card mb-3" style="width:20%;margin-left: 530px; ">
              <img src="<?php echo $row['img']?>" alt="Main Image" style="width:100%"/>
              </div>
            <?php
              $first = false;
            }else{
            ?>
              <div class="card" style="width:10%; display: inline-block;">
                     <img src="<?php echo $row['img'] ?>" style="max-width: 100%; height: auto;"/>
              </div>
          <?php
            }
          }
        ?>
   
   
  </div>
 </body>
</html>

