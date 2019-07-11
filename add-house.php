<?php
    //conect to the data bases
	require_once 'database.php';
	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	$db_name = DB_Name;
    $db_found = mysqli_select_db($conn, $db_name);
    
    /*ckeck if it is connected
    var_dump($db_found);*/
    $errtitle = $erradress = $errcity = $errpc = $errarea = $errprice = $errdescription = $errselect = $errphoto = $err = $message ="";

    if(isset($_POST['submit'])){

        $title = (string) htmlspecialchars($_POST['title']);
        if(!$title) $errtitle = "**Your title don't have a good format or it is emply**";
        
        $adress = (string) htmlspecialchars($_POST['adress']);
        if(!$adress) $erradress = "**Your adress don't have a good format or it is emply**";
            
        $city = (string) htmlspecialchars($_POST['city']);
        if(!$city) $errcity = "**Your city don't have a good format or it is emply**";
           
        $postCode = (int) htmlspecialchars($_POST['pc']);
        $finalPostCode = false;
        $postCodeValid = mb_strlen($postCode) == 4;
            if($postCodeValid){
                $finalPostCode = true;
            };
            if(!$postCodeValid) $errpc = "**Your post code don't have a good format or it is emply**";
            
        $area = (int) htmlspecialchars($_POST['area']);
        if(!$area) $errarea = "**Your area don't have a good format or it is emply**";
            
        $price = (int) htmlspecialchars($_POST['price']);
        if(!$price) $errprice = "**Your price don't have a good format or it is emply**";
        
        $type = (string) htmlspecialchars($_POST['type']);
        if(!$type) $errselect = "**Your type is not selected**";
        
        $description = (string) htmlspecialchars($_POST['description']);
        if(!$description) $errdescription = "**Your description don't have a good format or it is emply**";
        

//upload part

        $photo = (string) htmlspecialchars($_POST['my-file']);
        if(!$photo) $errphoto = "**Your photo don't have a good format or it is emply**";
        /* this part doesn't work
$_FILES['my-file']['name'];
$_FILES['my-file']['type']; 
$_FILES['my-file']['size']; 
$_FILES['my-file']['tmp_name']; 
$_FILES['my-file']['error']; 


$destinationDir = '/uploads/';
$destinationFilePath = $destinationDir . basename($_FILES['my-file']['name']);
// basename() return the name of the file without the full path of the directory and so on
if ($_FILES['my-file']['error'] != UPLOAD_ERR_OK) {
    echo 'Erreur lors du téléchargement.';
    die();
}

if (move_uploaded_file($_FILES['my-file']['tmp_name'], $destinationFilePath)) {
    echo 'Le fichier a été téléchargé.';
} else {
    echo 'Erreur lors de l\'enregistrement.';
}


$extFoundInArray = array_search(
    $_FILES['file']['type'], array(
        'jpg' => 'image/jpeg',
        'png' => 'image/png',
        'gif' => 'image/gif',
    )
);
if ($extFoundInArray === false) {
    echo 'Le fichier n\'est pas une image';
    die();
}

$path = './uploads/' . sha1_file($_FILES['upfile']['tmp_name']) . '.' . $extFoundInArray;
$moved = move_uploaded_file($_FILES['upfile']['tmp_name'], $path);
if (!$moved) {
    echo 'Erreur lors de l\'enregistrement';
}

$shaFile = sha1_file($_FILES['upfile']['tmp_name']);
$nbFiles = 0;
do {
    $path = './uploads/' . $shaFile . '_' . $nbFiles . '.' . $extFoundInArray;
    $nbFiles++;
} while(file_exists($path));

$moved = move_uploaded_file($_FILES['upfile']['tmp_name'], $path);
if (!$moved) {
    echo 'Erreur lors de l\'enregistrement';
}

//end of the upload
*/

        
    if($title && $adress && $city && $finalPostCode && $area && $price && $type && $description && $photo){

        // get id_type from the category
       $getTypeId = "SELECT id_type FROM `type` WHERE name_type ='$type'";
       $typeGet = mysqli_query($conn, $getTypeId);
       while ($typegeted = mysqli_fetch_assoc($typeGet)) {
        $type = $typegeted['id_type'];
       }

       //insert results

        $queryAdd = "INSERT INTO `housing` (`id_housing`, `title`, `adress`, `city`, `pc`, `area`, `price`, `photo`, `id_type`, `description`) VALUES (NULL, '$title', '$adress', '$city', '$postCode', '$area', '$price', '$photo', '$type', '$description');";
    
        $addResult= mysqli_query($conn, $queryAdd);
        
        if($addResult) $message = "*****Congratulations, you are sucessiful added a new house in your data bases!*****";

    }else{
        $err = "!!!something is happening, new house not added, please try again!!!";
    }
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

<form action="" method="POST">
  <h3><i class="fas fa-plus"></i> Insert new house</h3><br>

  <label for="title">Title:*</label><span><?php echo $errtitle;?></span><br>
  <input type="text" name="title" Placeholder="Enter the title" required><br><br>

  <label for="adress">Adress:*</label><span><?php echo $erradress;?></span><br>
  <input type="text" name="adress" placeholder="Enter the adress" required><br><br>

  <label for="city">City:*</label><span><?php echo $errcity;?></span><br>
  <input type="text" name="city" placeholder="Enter the city" required><br><br>

  <label for="number">Post code:*</label><span><?php echo $errpc;?></span><br>
  <small>L-</small><input type="number" name="pc" placeholder="Enter the poste code" required><br><br>

  <label for="area">Area:*</label><span><?php echo $errarea;?></span><br>
  <input type="number" name="area" placeholder="Enter the area" required><small>m²</small><br><br>

  <label for="price">Price:*</label><span><?php echo $errprice;?></span><br>
  <input type="number" name="price" placeholder="Enter the price" required><small>€</small><br><br>

  <label for="description">Description:*</label><span><?php echo $errdescription;?></span><br>
  <input type="text" name="description" placeholder="Enter the description" required><br><br>

  <label for="type">Select the type:*</label>
  <select name="type" required>
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
  </select><span><?php echo $errselect;?></span><br><br>

  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
  Upload the house's photo:* <input name="my-file" type="file" required />
  <span><?php echo $errphoto;?></span><br><br>

  <input type="submit" name='submit' value="Create new house" />
  <strong><?php echo $message; ?></strong><span><?php echo $err;?> 
</form>
<br><br>
<strong>
<a href="index.php">See all houses</a>
</strong>

</div>
</body>
</html>
