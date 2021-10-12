<?php 
  include '../include/navbar.php';
  include '../config/bdd.php';
  include '../model/connexion.html';

  @ $valid = $_POST['connexion'];

  if(isset($valid)){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $pass = sha1($password);
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=? AND pass=?');
    $recupUser ->execute([$email,$pass]);
    
    foreach($recupUser as $data){
      $statu = $data['statu'];
      $username = $data['username'];
      $email = $data['email'];
      $niveaux = $data['lvl'];
      $id = $data['id'];
        if($statu == 1){
          if($recupUser -> rowCount()>0){
            // $_SESSION['username']= $username; 
            // $_SESSION['email']= $email; 
            $_SESSION['niveaux']= $niveaux; 
            $_SESSION['id']= $id;
            header('location:catalogue.php');
          }
        }else{
          echo 'utilisateur non valider';
        }
    }
  }

?>