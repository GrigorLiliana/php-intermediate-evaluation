<?php
    //conect to the data bases
	require_once 'database.php';
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	$db_name = DB_Name;
    $db_found = mysqli_select_db($conn, $db_name);
    
    /*ckeck if it is connected
    var_dump($db_found);*/
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

<form action="" method="POST">
  <h3><i class="fas fa-plus"></i> Insert new house</h3><br>

  <label for="title">Title:*</label><br>
  <input type="text" name="title" Placeholder="Enter the title" required><br><br>

  <label for="title">Adress:*</label><br>
  <input type="text" name="adress" placeholder="Enter the adress" required><br><br>

  <label for="title">City:*</label><br>
  <input type="text" name="city" placeholder="Enter the city" required><br><br>

  <label for="title">Post code:*</label><br>
  <span>L-</span><input type="number" name="pc" placeholder="Enter the poste code" required><br><br>

  <label for="title">Area:*</label><br>
  <input type="number" name="area" placeholder="Enter the area" required><span>m²</span><br><br>

  <label for="title">Price:*</label><br>
  <input type="number" name="area" placeholder="Enter the area" required><span>€</span><br><br>

  <label for="selectCategorie">Select the type:*</label>
  <select name="selectCategorie" required>
    <option value="" name="" selected disabled>Choose one category</option>
    <?php

    $queryType = "select * from type";
    $resultType = mysqli_query($conn, $queryType);
    var_dump($resultType);
    // generate dinamic types options linked to the DB

    while ($db_recordType = mysqli_fetch_assoc($resultType)) {
      $idType = $db_recordType['id_type'];
      $nameType = $db_recordType['name_type']; ?>

      <!-- dinamic option -->
      <option value="<?php echo $nameType; ?>" name="<?php echo $nameType; ?>">
        <?php echo $nameType; ?>
      </option>

    <?php }
    ?>
  </select><br><br>

  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  Upload the house's photo:* <input name="my-file" type="file" required /><br><br>

  <input type="submit" name='submit' value="Create new house" />
</form>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit']))
    var_dump($_POST['my-file']);
    var_dump($_POST['selectCategorie']);