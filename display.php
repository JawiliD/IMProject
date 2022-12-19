<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Im Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
        <a class="logout" href="logout.php">Logout</a>
            <div class="header">
                <h1 class="text-light">Welcome to my E-Journal</h1>
                <img class="image" src="journal.gif">
                <button class="button my-5"><a href="user.php" class="text-light">Write your thoughts</a></button>
            </div>         
            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">S1</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Description</th>  
                <th scope="col">Operation</th>              
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql="Select * from `info`";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['journal_id'];
                        $date=$row['date'];
                        $time=$row['time'];
                        $content=$row['content'];                       
                        echo '<tr>
                                <th scope="row">'.$id.'</th>
                                <td >'.$date.'</td>
                                <td>'.$time.'</td>
                                <td>'.$content.'</td>                                
                                <td>
                                <button class="btn btn-primary"><a href="update.php?updateid='.$id.'" class="text-light">Edit</a></button>
                                <button class="btn btn-danger"><a href="delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                                </td>
                            </tr>';
                    }
                    
                }

                ?>
                
                
            </tbody>
            </table>
        </div>
    </body>
    </html>
