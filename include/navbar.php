<?php 
  include '../config/bdd.php';
  include 'auto-check.php';
  session_start();
  @ $utilisateur = $_SESSION['niveaux'];
?>  
  
  <header id="navbar" class="flex justify-center pt-2 pb-2 w-screen border-b border-black">
    <nav class="flex justify-between m-auto items-center">
      <ul class="flex items-center justify-around">
        <?php if ($utilisateur == 1 || $utilisateur == 2  || $utilisateur == 3 ) { ?>
          <!-- desktop -->
           <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="catalogue.php">Catalogue</a></li>
           <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="viewLoan.php">Emprunter</a></li>
           <li class="pl-2 pr-2 ml-12 order-last lg:block md:hidden"><a href="deco.php">Déconnexion</a></li>
          <!-- mobile -->
          <!-- <div class="lg:hidden md:block"> -->
            <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="catalogue.php"><img class="w-14" src="../image/book.svg"></a></li>
            <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="viewLoan.php"><img class="w-14" src="../image/emprunt.svg" alt=""></a></li>
            <li class="pl-2 pr-2 ml-12 order-last lg:hidden md:block"><a href="deco.php"><img class="w-14" src="../image/power.svg"></a></li>
          <!-- </div> -->
        <?php }else{?>
          <!-- desktop -->
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="home.php">Accueil</a></li>
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="incription.php">Incription</a></li>
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="connexion.php">Connexion</a></li>
          <!-- mobile -->
          <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="home.php"><img class="w-14" src="../image/book.svg"></a></li>
          <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="incription.php"><img class="w-14" src="../image/pencil.svg"></a></li>
          <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="connexion.php"><img class="w-14" src="../image/connexion.svg"></a></li>
        <?php } ?>
        <?php if ($utilisateur == 1 || $utilisateur == 2){ ?>
          <!-- desktop -->
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="addbook.php">Ajouter Livre</a></li>
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="uservalid.php">Valider utilisateur</a></li>
          <!-- mobil -->
          <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="addbook.php"><img class="w-14" src="../image/addBook.svg" ></a></li>
          <li class="pl-2 pr-2 ml-12 lg:hidden md:block"><a href="uservalid.php"><img class="w-14" src="../image/valid-user.svg" alt=""></a></li>
        <?php } ?>
        <?php if ($utilisateur == 1){ ?>
          <!-- desktop -->
          <li class="pl-2 pr-2 ml-12 lg:block md:hidden"><a href="adminuser.php">administré utilisateur</a></li>
          <!--mobile  -->
        <?php } ?>
      </ul>
    </nav>
  </header>