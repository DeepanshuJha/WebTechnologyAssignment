<?php
    $con = mysqli_connect("localhost", "root", "", "user");
    
    extract($_POST);

    if(isset($_POST['readRecords'])){

        $data = '<table class="table table-bordered table-striped">
                <tr>
                    <th>No.</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Delete Action</th>
                </tr>';
        
        $query = "Select * from login";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0){
            $number = 1;
            while($row = mysqli_fetch_array($result)){
                $data .= '<tr>
                            <td>'.$number.'</td>
                            <td>'.$row['rollno'].'</td>
                            <td>'.$row['name'].'</td>
                            <td><button type="button" class="btn btn-danger" onclick="deleteUser('.$row['rollno'].')">Delete</button></td>
                         </tr>';
                $number++;
            }
        }
        $data .= "</table>";
        echo $data;
    }

    if(isset($_POST['rollno']) && isset($_POST['name'])){
        $query = "insert into login values('$rollno', '$name')";
        mysqli_query($con, $query);
    }

    if(isset($_POST['deleteId'])){
        $query = "delete from login where rollno = '$deleteId'";
        mysqli_query($con, $query);
    }
?>