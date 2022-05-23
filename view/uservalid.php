<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valider Utilisateur</title>
  <link rel="stylesheet" href="../css/tailwind.css">
  <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../image/book.svg" type="image/x-icon">

</head>
<body>
  <?php
    include '../include/navbar.php';
    include '../config/bdd.php';
    if($_SESSION['niveaux'] == 3){
      header('location:home.php');
    }
    $users = $bdd ->query('SELECT * FROM users WHERE statu=0 AND lvl=3');
  ?>

<form action="" method="post" class="flex justify-center items-center">
    <div>
    <?php 
        foreach( $users as $valueUser){
          $id = $valueUser['id'];
          $firstname = $valueUser['firstname'];
          $lastname = $valueUser['lastname'];
          $email = $valueUser['email'];
          $adress = $valueUser['adress'];
          $date = $valueUser['birth'];   
          $year = substr($date, 0,4);
          $month = substr($date, 5,2);
          $day = substr($date, 8,2);
          $birth = $day.'/'.$month.'/'.$year;

          echo "<div class='border border-black'>".$firstname."   ".$lastname."   ".$email."    ".$adress."    ".$birth."<input type='checkbox' class='mx-3' name='userid[]' value='$id'><br></div>";
        }
    ?>
    </div>
    <div class="flex justify-center items-center ml-7 flex-col">
      <button type="submit" class="valid font-bold text-white border-2 mt-3 rounded pl-1 pr-1" name="valid-user">Valider</button>
      <button type="submit" class="valid font-bold text-white border-2 mt-3 rounded pl-1 pr-1" name="actualisation">Actualiser</button>
    </div>
</form>

<?php
  @ $valid = $_POST['valid-user'];
  @ $select = $_POST['userid'];
  @ $actual = $_POST['actualisation'];
  $subject = 'compte valider';
  $message = 'Votre compte à été valider';
  
  if(isset($valid)){
    foreach ($select as $userValid){
      $update = $bdd->query('UPDATE users SET statu=true WHERE id='.$userValid.'');
      $usersEmail = $bdd->query ('SELECT email FROM users WHERE id='.$userValid.''); 
      foreach($usersEmail as $data){
        $mail = $data['email'];
        mail($mail,$subject,$message);
      }
    }
  }

  if(isset($actual)){
    header("Refresh:0");
  }
?>
</body>
</html>