<?php
  try{
    // $bdd= new PDO('mysql:host=mysql-barbedany.alwaysdata.net;dbname=barbedany_ecf;charset=utf8', 'barbedany', 'Doudou10');
    $bdd= new PDO('mysql:host=localhost;dbname=ecf;charset=utf8', 'root', '');
  }
  catch (Exception $e){
    die('Erreur : ' .$e->getMessage());
  }
?>