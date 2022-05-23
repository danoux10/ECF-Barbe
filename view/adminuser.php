<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valider Utilisateur</title>
    <link rel="shortcut icon" href="../image/book.svg" type="image/x-icon">
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
 
</head>
<body>
  <?php
    include '../include/navbar.php';
    if($_SESSION['niveaux'] == 3 || $_SESSION['niveaux'] == 2 ){
      header('location:home.php');
    }
  ?>

  <form action="" method="post" class="flex justify-center items-center mt-8 mx-8">
    <div class="grid grid-cols-4 gap-5">
      <fieldset class="border border-black h-80 overflow-scroll">
        <legend class="font-bold">Admin</legend>
        <?php
          $admin = $bdd->query('SELECT * From users where lvl=1');
          foreach ($admin as $data){
            $username = $data['username'];
            $email = $data['email'];
            $adress = $data['adress'];
            $date = $data['birth'];
            $id = $data['id'];
            $statu = $data['statu'];
            $year = substr($date, 0,4);
            $month = substr($date, 5,2);
            $day = substr($date, 8,2);
            $birth = $day.'/'.$month.'/'.$year;
            if($statu == 1){
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }else{
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Non Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }
          }
        ?>
      </fieldset>

      <fieldset class="border border-black h-80 overflow-scroll">
        <legend class="font-bold">Employé</legend>
        <?php
          $employer = $bdd->query('SELECT * From users where lvl=2');
          foreach ($employer as $data){
            $username = $data['username'];
            $email = $data['email'];
            $adress = $data['adress'];
            $id = $data['id'];
            $statu = $data['statu'];
            $date = $data['birth'];
            $year = substr($date, 0,4);
            $month = substr($date, 5,2);
            $day = substr($date, 8,2);
            $birth = $day.'/'.$month.'/'.$year;

            if($statu == 1){
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }else{
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Non Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }
          }
        ?>
      </fieldset>

      <fieldset class="border border-black h-80 overflow-scroll">
        <legend class="font-bold">utilisateur</legend>
        <?php
          $utilisateur = $bdd->query('SELECT * From users where lvl=3');
          foreach ($utilisateur as $data){
            $username = $data['username'];
            $email = $data['email'];
            $adress = $data['adress'];
            $id = $data['id'];
            $statu = $data['statu'];
            $date = $data['birth'];
            $year = substr($date, 0,4);
            $month = substr($date, 5,2);
            $day = substr($date, 8,2);
            $birth = $day.'/'.$month.'/'.$year;

            if($statu == 1){
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }else{
              echo $username.'--'.$email.'--'.$adress.'--'.$birth.'--'."Non Valider--<input type='checkbox' class='' name='userid[]' value='$id'><br>";
            }
          }
        ?>
      </fieldset>

      <div class="flex justify-center items-center flex-col">
        <?php include '../include/select-level.php'; ?>
        <div class="grid grid-cols-2 gap-1">
          <button type="submit" name="valid" class="valid font-bold text-white border-2 mt-3 rounded">valider Utilisateur</button>
          <button type="submit" name="delete" class="valid font-bold text-white border-2 mt-3 rounded">Supprimer Utilisateur</button>
          <button type="submit" name="grade" class="valid font-bold text-white border-2 mt-3 rounded">Changer niveaux</button>
          <button name="add" class="valid font-bold text-white border-2 mt-3 rounded"><a href="incription.php">Créer utilisateur</a></button>
          <!-- <button name="add" name="download" class="valid font-bold text-white border-2 mt-3 rounded">download table</button> -->
        </div>
      </div>
    </div>
  </form>
<?php 
  @ $valid = $_POST['valid'];
  @ $delete = $_POST['delete'];
  @ $level = $_POST['grade'];
  @ $add = $_POST['add'];
  @ $select = $_POST['userid'];
  @ $download = $_POST['download'];
  @ $niveaux = $_POST['level'];

  if(isset($valid)){
    foreach ($select as $userValid){
      $update = $bdd->query('UPDATE users SET statu=true WHERE id='.$userValid.'');
      $usersEmail = $bdd->query ('SELECT email FROM users WHERE id='.$userValid.''); 
      foreach($usersEmail as $data){
        $mail = $data['email'];
        mail($mail,$subject,$message);
      }
    }
    header("Refresh:0");
  }

  if(isset($delete)){
    foreach ($select as $userValid){
      $update = $bdd->query('DELETE FROM users WHERE id='.$userValid.'');
    }
    @ header("Refresh:0");
  }

  if(isset($level) && $niveaux != 0){
    foreach ($select as $userValid){
      $update = $bdd->query('UPDATE users SET lvl='.$niveaux.' WHERE id='.$userValid.'');
      echo 'niveau mis a jours';
    }
    @ header("Refresh:0");
  }

  if(isset($download)){
    echo 'working progress';
  }
?>
</body>
</html>