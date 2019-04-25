<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-3">INSERT OPERATION</h1>
        <div style="width:500px; margin: auto; position:relative; top:75px;">
        <?php
        include_once('config.php');

        if(isset($_POST['submit'])){
            $rollno = $_POST['rollno'];
            $name = $_POST['name'];

            $query = "insert into login values('$rollno', '$name')";
            $res = mysqli_query($con, $query);
            if($res){
                echo "<h4 class='text-success'>Success</h4>";
            }
            
        }
    ?>
            <form action="add.php" method="POST">
                <div class="form-group">
                    <label for="rollno">Roll No</label>
                    <input type="text" name="rollno" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <input type="submit" class="btn btn-success px-4" name="submit">
                <a href="index.php" role="button" class="btn btn-primary">Go Back</a>
            </form>
        </div>
    </div>
    <script src="bootstrap.min.js"></script>
</body>
</html>