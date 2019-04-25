<!DOCTYPE html>
<html lang="en">
<head>
    <title>Display</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-primary my-3">DISPLAY OPERATION</h1>
        <div class="my-4">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Roll No</th>
                    <th>Name</th>
                </tr>
                <?php
                    include_once("config.php");
                    $query = "Select * from login";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result) > 0){
                        $number = 1;
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".$row['rollno']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "</tr>";
                            $number++;
                        }
                    }
                ?>
            </table>
        </div>
        <a href="index.php" role="button" class="btn btn-primary">Go Back</a>
    </div>
    <script src="bootstrap.min.js"></script>
</body>
</html>