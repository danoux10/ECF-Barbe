<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter Livre</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <form method="POST" enctype="multipart/form-data" class="flex justify-center content-center items-center mt-64">
    <fieldset class="flex justify-center content-center flex-col border border-black rounded p-4">
      <legend class="text-center font-bold text-lg">Ajouter Livre</legend>
      <label for="titre" class="text-center">Titre</label>
      <input type="text" name="titre" id="titre" class="border rounded-sm border-black">
      
      <label for="auteur" class="text-center mt-2">Auteur</label>
      <input type="text" name="auteur" id="auteur" class="border rounded-sm border-black">
      
      <label for="parution" class="text-center mt-2">Date de parution</label>
      <input type="date" name="parution" id="parution" class="text-center border rounded-sm mb-3 border-black">
      
      <?php include_once '../include/select-Genre.php';?>
      
      <label for="cover" class="text-center mt-2">Couverture</label>
      <input type="file" name="cover"  id="cover"  accept=".png, .jpg, .svg">

      <label for="description" class="text-center mt-2">Description</label>
      <textarea name="description" id="description" cols="30" rows="3" class="border rounded-sm border-black"></textarea>

      <button type="submit" name="validBook" class="valid font-bold text-white border-2 mt-3 rounded">Ajouter Livre</button>
    </fieldset>
    <fieldset class="flex justify-center content-center flex-col border ml-3 border-black rounded p-4">
      <legend class="text-center font-bold text-lg">Ajouter genre</legend>
      <label for="add-genre" class="text-center mt-2">Genre</label>
      <input type="text" name="ajouter-genre" id="add-genre" class="border rounded-sm border-black">
      <button type="submit" name="add-genre" class="valid font-bold text-white border-2 mt-3 rounded">Ajouter genre</button>
    </fieldset>
  </form>
</body>
</html>