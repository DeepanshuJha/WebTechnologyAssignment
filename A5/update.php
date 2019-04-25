<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-primary text-center my-3">UPDATE OPERTION</h1>
        <div class="my-4" style="width:500px; margin: auto; position:relative; top:75px;">

            <?php
            
                include_once('config.php');

                if(isset($_POST['rollno']) && isset($_POST['name'])){
                    $rollno = $_POST['rollno'];
                    $name = $_POST['name'];

                    $query = "UPDATE `login` SET `name`= '$name' WHERE `rollno` = '$rollno'";
                    $res = mysqli_query($con, $query);

                    if($res){
                        echo "<h4 class='text-success'>Success</h4>";
                    }
                }

            ?>

            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="rollno">Roll No</label>
                    <input type="text" class="form-control" name="rollno">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <input type="submit" class="btn btn-warning px-4" name="submit">
                <a href="index.php" role="button" class="btn btn-primary">Go Back</a>
            </form>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
</body>
</html>