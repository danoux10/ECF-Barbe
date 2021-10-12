<?php 
  include '../config/bdd.php';
  include_once 'auto-check.php';
  session_start();
  @ $utilisateur = $_SESSION['niveaux'];
  // echo $_SESSION['niveaux']."-".$_SESSION['id']."-".$_SESSION['email']."-".$_SESSION['username'];
?>  
  
  
  <header id="navbar" class="flex justify-center pt-2 pb-2 w-screen border-b border-black">
    <nav class="flex justify-between m-auto items-center">
      <ul class="flex items-center justify-around">
        <li class="pl-2 pr-2 ml-12"><a href="home.php">Accueil</a></li>
        <?php if ($utilisateur == 1 || $utilisateur == 2  || $utilisateur == 3 ) { ?>
          <li class="pl-2 pr-2 ml-12"><a href="catalogue.php">Catalogue</a></li>
          <li class="pl-2 pr-2 ml-12"><a href="viewLoan.php">Emprunter</a></li>
          <li class="pl-2 pr-2 ml-12 order-last"><a href="deco.php">Déconnexion</a></li>
        <?php }else{?>
          <div class="bloc flex flex-row">
            <li class="pl-2 pr-2 ml-12"><a href="incription.php">Incription</a></li>
            <li class="pl-2 pr-2 ml-12"><a href="connexion.php">Connexion</a></li>
          </div>
        <?php } ?>
        <?php if ($utilisateur == 1 || $utilisateur == 2){ ?>
          <li class="pl-2 pr-2 ml-12"><a href="addbook.php">Ajouter Livre</a></li>
          <li class="pl-2 pr-2 ml-12"><a href="uservalid.php">Valider utilisateur</a></li>
        <?php } ?>
        <?php if ($utilisateur == 1){ ?>
          <li class="pl-2 pr-2 ml-12"><a href="adminuser.php">administré utilisateur</a></li>  
        <?php } ?>
      </ul>
    </nav>
  </header>