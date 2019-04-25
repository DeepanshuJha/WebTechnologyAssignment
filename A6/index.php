<html>
    <head>
        <title>Ajax</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery-3.2.1.min.js"></script>
    </head>
    <body>
    <div class="container">
        <h1 class="text-center text-primary my-2">AJAX CRUD OPERATION</h1>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn-lg btn-warning" data-toggle="modal" data-target="#input">INSERT</button>
        </div>

        <div>
            <h2 class="text-danger">ALL RECORDS</h2>
            <div id="records_content"></div>
        </div>

        <div class="modal fade" id="input" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>INSERT OPERATION</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rollno">ROLL NO</label>
                            <input type="text" class="form-control" id="rollno"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecords()">SAVE</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="bootstrap.min.js"></script>

    <script>

        $(document).ready(function(){
            readRecords();
        });

        function readRecords(){
            var readRecords = "readRecords";

            $.ajax({
                url : 'backend.php',
                type: 'post',
                data : { readRecords : readRecords },
                success: function(data, status){
                    $("#records_content").html(data);
                }
            });
        }

        function addRecords(){
            var name = $('#name').val();
            var rollno = $('#rollno').val();
            
            $.ajax({
                url: 'backend.php',
                type: 'post',
                data : {
                    rollno : rollno,
                    name : name
                },
                success:function(data, status){
                    readRecords();
                }
            });
        }

        function deleteUser(id){
            var conf = confirm("Are you sure ?");
            if(conf == true){
                $.ajax({
                    url: 'backend.php',
                    type: 'post',
                    data: {deleteId: id},
                    success:function(data, status){
                        readRecords();
                    }
                });
            }
        }
    </script>
    </body>
</html>