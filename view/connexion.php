<?php 
  include '../include/navbar.php';
  include '../config/bdd.php';
  include '../model/connexion.html';

  @ $valid = $_POST['connexion'];
  @ $connexion_user =  $_POST['connexionUser'];
  @ $connexion_employer =  $_POST['connexionEmployer'];
  @ $connexion_admin =  $_POST['connexionAdmin'];

  if(isset($valid)){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=?');
    $recupUser ->execute([$email]);
    
    foreach($recupUser as $data){
      $statu = $data['statu'];
      $username = $data['username'];
      $pass = $data['pass'];
      $email = $data['email'];
      $niveaux = $data['lvl'];
      $id = $data['id'];

      if(password_verify($password,$pass)){
        if($statu == 1){
          if($recupUser -> rowCount()>0){
            $_SESSION['niveaux']= $niveaux;
            $_SESSION['id']= $id;
            header('location:catalogue.php');
          }
        }else{
          echo 'utilisateur non valider';
        }
      }else{
        echo 'mot de pass incorect';
      }
    }
  }
  
  if(isset($connexion_user)){
   $email = 'user@user.user';
   $password = 'user';
 
   $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=?');
   $recupUser ->execute([$email]);
 
   foreach($recupUser as $data){
    $statu = $data['statu'];
    $username = $data['username'];
    $pass = $data['pass'];
    $email = $data['email'];
    $niveaux = $data['lvl'];
    $id = $data['id'];
  
    if(password_verify($password,$pass)){
     if($statu == 1){
      if($recupUser -> rowCount()>0){
       $_SESSION['niveaux']= $niveaux;
       $_SESSION['id']= $id;
       header('location:catalogue.php');
      }
     }else{
      echo 'utilisateur non valider';
     }
    }else{
     echo 'mot de pass incorect';
    }
   }
  }
  if(isset($connexion_employer)){
   $email = 'employer@employer.employer';
   $password = 'employer';
 
   $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=?');
   $recupUser ->execute([$email]);
 
   foreach($recupUser as $data){
    $statu = $data['statu'];
    $username = $data['username'];
    $pass = $data['pass'];
    $email = $data['email'];
    $niveaux = $data['lvl'];
    $id = $data['id'];
  
    if(password_verify($password,$pass)){
     if($statu == 1){
      if($recupUser -> rowCount()>0){
       $_SESSION['niveaux']= $niveaux;
       $_SESSION['id']= $id;
       header('location:catalogue.php');
      }
     }else{
      echo 'utilisateur non valider';
     }
    }else{
     echo 'mot de pass incorect';
    }
   }
  }
  
  if(isset($connexion_admin)){
   $email = 'admin@admin.admin';
   $password = 'admin';
 
   $recupUser = $bdd->prepare('SELECT * FROM users WHERE email=?');
   $recupUser ->execute([$email]);
 
   foreach($recupUser as $data){
    $statu = $data['statu'];
    $username = $data['username'];
    $pass = $data['pass'];
    $email = $data['email'];
    $niveaux = $data['lvl'];
    $id = $data['id'];
  
    if(password_verify($password,$pass)){
     if($statu == 1){
      if($recupUser -> rowCount()>0){
       $_SESSION['niveaux']= $niveaux;
       $_SESSION['id']= $id;
       header('location:catalogue.php');
      }
     }else{
      echo 'utilisateur non valider';
     }
    }else{
     echo 'mot de pass incorect';
    }
   }
  }

?>