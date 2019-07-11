<?php
    //conect to the data bases
	require_once 'database.php';
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	$db_name = DB_Name;
    $db_found = mysqli_select_db($conn, $db_name);
    var_dump($db_found);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liliana's php "Real Estate" Project</title>
</head>
<body>
    
</body>
</html>