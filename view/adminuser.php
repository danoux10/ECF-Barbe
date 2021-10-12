<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valider Utilisateur</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
 
</head>
<body>
  <?php
    include '../include/navbar.php';
    include '../config/bdd.php';
    $users = $bdd ->query('SELECT * FROM users'); 
    if($_SESSION['niveaux'] == 3 || $_SESSION['niveaux'] == 2 ){
      header('location:home.php');
    }
  ?>

<h1 class="uppercase">work in progress</h1>
</body>
</html>