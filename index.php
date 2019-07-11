<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liliana's php "Real Estate" Project</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://kit.fontawesome.com/80c962dd4c.js"></script>
</head>
<body>
<table border>
<thead>
<tr>
<th>ID</th>
<th>Photo</th>
<th>Title</th>
<th>Adress</th>
<th>City</th>
<th>Postal Code</th>
<th>Area (m²)</th>
<th>Price (€)</th>
<th>Rent / Sale</th>
<th>Description</th>
</tr>
</thead>
<tbody>

<?php

//conect to the data bases
require_once 'database.php';

$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = DB_Name;
$db_found = mysqli_select_db($conn, $db_name);

    // get all houses from the category
   $getHouses = "SELECT h.*, t.name_type FROM housing h inner join type t on h.id_type = t.id_type";
   $resultQuery = mysqli_query($conn, $getHouses);

while ($house = mysqli_fetch_assoc($resultQuery)) {
    $id = $house['id_housing'];
    $title = $house['title'];
    $adress = $house['adress'];
    $city = $house['city'];
    $pc = $house['pc'];
    $area = $house['area'];
    $price = $house['price'];
    $photo = $house['photo'];
    $type = $house['name_type'];
    $description = $house['description'];
?>
<tr>
<td><?php echo $id ?></td>
<td><img width=50 src="<?php echo $photo ?>" alt=""></td>
<td><?php echo $title ?></td>
<td><?php echo $adress ?></td>
<td><?php echo $city ?></td>
<td><?php echo $pc ?></td>
<td><?php echo $area ?></td>
<td><?php echo $price ?></td>
<td><?php echo $type ?></td>
<td><?php echo $description ?></td>
</tr>
<?php }

?>
</tbody>
</table>
<a href="add-house.php">Add new house</a>

</body>
</html>
