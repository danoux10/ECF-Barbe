<?php
  include '../config/bdd.php';
  include '../include/navbar.php';
  include '../model/inscription.html';

  if(isset($_POST['valid'])){
    $lastname = htmlspecialchars($_POST['nom']);
    $firstname = htmlspecialchars($_POST['prenom']);
    $username = $firstname.'    '.$lastname;
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $adress = htmlspecialchars($_POST['adress']);
    $bith = $_POST['birth'];
    $pass = sha1($password);

    $inscri = $bdd ->prepare('INSERT INTO users SET firstname= ?,lastname= ?,username= ?,email= ?,pass= ?,adress= ?,birth= ?,lvl= 3,statu=false');
    $inscri ->execute([$firstname,$lastname,$username,$email,$pass,$adress,$bith]);
    header('location:home.php');
  }
?>
