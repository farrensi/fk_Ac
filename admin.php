<?php
require_once 'config.php';

// Read all jasa
$sql = "SELECT * FROM jasa";
$result = $conn->query($sql);

// Display jasa in a table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        table img {
            width: 50px;
            height: auto;
        }
        .table thead th {
            vertical-align: middle;
            text-align: center;
        }
        .table tbody td {
            vertical-align: middle;
            text-align: center;
        }
        .btn {
            margin: 0 5px;
        }
        h2 {
            margin-bottom: 30px;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Jasa</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['nama_jasa'];?></td>
                            <td><?php echo $row['harga'];?></td>
                            <td><img src="img/<?php echo $row['foto'];?>" alt="<?php echo $row['nama_jasa'];?>" class="img-thumbnail"></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    
                </table>
                
                <a href="create.php" class="btn btn-success">Create New Jasa</a>
            </div>
        </div>
    </div>
    <br>
    <br>
</body>
</html>