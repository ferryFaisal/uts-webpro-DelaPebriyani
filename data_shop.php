<?php
require "database.php";


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <table class="table">
        <div class="page-header clearfix">
            <center><h2 class="pull-left">Daftar Produk</h2></center>
            <a href="data_products.php" class="btn btn-success pull-right">Tambah Produk</a>
        </div>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
                <th>Date created</th>
                <th>Date Modified</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?=$row["id"];?></td>
                <td><?=$row["name"];?></td>
                <td><?=$row["description"];?></td>
                <td><?=$row["price"];?></td>
                <td><img src="image/<?= $row['photo']?>" width="120px" height="70px"></td>
                <td><?=$row["created"];?></td>
                <td><?=$row["modified"];?></td>
                <?php echo" <td> 
                <a href='update.php?id=$row[id]'>Edit</a>|
                <a href='delete.php?id=$row[id]'onClick=\"return confirm('Anda Yakin akan menghapus data ini?')\">Delete</a>
                           </td>";
                ?>
            </tr>
            <?php
                }
                ?>

        </tbody>
    </table>
    <?php
            }
            $conn->close();
    ?>
</body>

</html>