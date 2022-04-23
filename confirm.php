<?php
    include './connect.php';
    if(isset($_POST['confirm']))
    {
        $email = $_POST['confirm'];
        $confirm = "update logup set confirm = 1 where email = '$email'";
        mysqli_query($conn,$confirm);

        
    }
   elseif(isset($_POST['delete']))
    {
        $email = $_POST['delete'];
        $confirm = "update logup set confirm = -1 where email = '$email'";
        mysqli_query($conn,$confirm);
       
    }
    elseif(isset($_POST['update']))
    {
        $email = $_POST['update'];
        $confirm = "update logup set confirm = 2 where email = '$email'";
        mysqli_query($conn,$confirm);
       
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="table-responsive">
            <table class="table table-bordered mt-4" id="studentTbl">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Birthday</th>
                    <th>CMNDbefore</th>
                    <th>CMNDafter</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
               
                </tbody>
            </table>
    </div>
    <!-- Edit modal -->
        <div class="modal fade" id="edit-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role='document'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <form action="./confirm.php" method="POST">
                        <input type="hidden" name="confirm" id="confirm"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="editBtn" class="btn btn-success">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="del-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role='document'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <form action="./confirm.php" method="POST">
                        <input type="hidden" name="delete" id="delete"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="deleteBtn" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update-Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role='document'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <form action="./confirm.php" method="POST">
                        <input type="hidden" name="update" id="update"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="updateBtn" class="btn btn-primary">Update</button>
                    </form>
                    
                    </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="./main.js"></script>
</html>
