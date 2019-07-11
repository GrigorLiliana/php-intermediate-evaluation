<?php

    //conect to the data bases
	require_once 'database.php';
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	$db_name = DB_Name;
    $db_found = mysqli_select_db($conn, $db_name);
    
    /*ckeck if it is connected
    var_dump($db_found);*/
    

        // get all houses from the category
       $getHouses = "SELECT h.*, t.name_type FROM housing h inner join type t on h.id_type = t.id_type";
       $resultQuery = mysqli_query($conn, $getHouses);

       while ($house = mysqli_fetch_assoc($resultQuery)) {
        $title = $house['title'];
       }

?>
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
<div class="container">


<a href="add-house.php">Add new house</a>
</div>
</body>
</html>
