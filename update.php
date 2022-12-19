<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="Select * from `info` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
date_default_timezone_set("Asia/Manila");
$date=$row['date'];
$time=$row['time'];
$content=$row['content'];
if(isset($_POST['submit'])){
    date_default_timezone_set("Philippines/Manila");    
    $date=date('d-m-y');
    $time=date('h:i:a');
    $content=$_POST['content'];    

    $sql="update `info` set journal_id='$id',date='$date',time='$time',content='$content' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){        
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">

    <title>IM Project</title>
  </head>
  <body>
   <div class="container my-5">
   <h1>Today is <?php echo date("l Y/m/d") ?></h1> 
    <h3>The time is <?php echo date('h:i:a') ?></h3>
    <form method="post">
    <div class="form-group">
    <h3>How are you today?</h3> 
        <textarea type="text" class="form-control" placeholder="Enter your thoughts" name="content" autocomplete="off"><?php echo $content?></textarea>        
    </div>
  
    <button type="submit" class="button" name="submit">Update</button>
    </form>
    </div>    
  </body>
</html>