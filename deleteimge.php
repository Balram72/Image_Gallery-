
<?php 
include('conn.php');
$id = $_GET['imgid'];
$q = "select * from data where id=$id";
 $res = mysqli_query($con,$q);
 while($row = mysqli_fetch_array($res)){
     $oldpath =  $row['img'];
 }
$query ="DELETE FROM data WHERE id=$id";
$res = mysqli_query($con,$query);
    unlink($oldpath);
    header('Location: index.php');

?>

