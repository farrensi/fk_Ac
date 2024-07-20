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
</head>
<body>
    <div class="container">
        <h2 class="text-center">Admin Dashboard</h2>
        <table class="table table-striped">
            <thead>
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
                    <td><img src="img/<?php echo $row['foto'];?>" alt="<?php echo $row['nama_jasa'];?>"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a>
                        <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Create New Jasa</a>
    </div>
</body>
</html>