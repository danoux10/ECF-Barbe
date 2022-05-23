<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalogue</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../image/book.svg" type="image/x-icon">

</head>
<body>
<?php 
  include '../include/navbar.php';
  // echo $_SESSION['niveaux']."<br>".$_SESSION['id'];
?>

  <div class="flex justify-center mt-9">
    <form method="POST" class="w-8/12 mr-9">
      <div class="flex">
        <label for="search" class="lg:block md:hidden">
          <img src="../image/search.svg" alt="search icon" class="w-7 h-7 inline border border-black bg-gray-400 rounded-full p-1 cursor-pointer">
        </label>
        <input type="text" name="bar" placeholder="search" id="search" class="border border-black rounded-ml ml-1 mr-1 pl-0.5">
        <?php include'../include/select-Genre.php';?>
      <button type="submit" name="search" class="border-2 border-black p-0.5 ml-1 rounded valid font-bold text-white">Rechercher</button>
    </div>
    
    <div class="flex lg:flex-row md:flex-col">
      <fieldset class="border border-black lg:w-4/5 md:w-full">
          <legend class="font-bold">Catalogue</legend>
          <div class="grid lg:grid-cols-10 lg:gap-3 md:grid-cols-5 md:gap-1">
            <?php 
             include '../include/book.php';
            ?>
          </div>
      </fieldset>
      <?php include '../include/bookInfo.php';?>
    </div>
    </form>
  </div>
</body>
</html>