<?php 
  include '../include/navbar.php';
  include '../model/ajouterBook.php';

  if(isset($_POST['add-genre'])){
    $newgenre = htmlspecialchars($_POST['ajouter-genre']);
    $addgenre = $bdd->prepare('INSERT INTO genre set nom=?');
    $addgenre -> execute([$newgenre]);
    header("Refresh:0");
  }
  
  if(isset($_POST['validBook'])){
    $titre = htmlspecialchars($_POST['titre']);
    $author = htmlspecialchars($_POST['auteur']);
    $parution = $_POST['parution'];
    $genre = $_POST['genre'];
    $description = htmlspecialchars($_POST['description']);
   
    if(isset($_FILES['cover'])){
      if($_FILES['cover']['error'] !== UPLOAD_ERR_OK){
        echo 'erreur de téléchargement';
      }elseif($_FILES['cover']['size']>200000){
        $filename = uniqid();
        $info = pathinfo($_FILES['cover']['name']);
        
        $image = 'cover/'.$filename.'.'.$info['extension'];
        // echo $image."<br>";
        move_uploaded_file($_FILES['cover']['tmp_name'],'../cover/'.$filename.'.'.$info['extension']);
        echo 'telechargement réussi';
        $addbook = $bdd->prepare('INSERT INTO book set title=?, author=?, cover=?, style=?, info=?, parution=?, statu=true');
        $addbook -> execute([$titre,$author,$image,$genre,$description,$parution]);
      }else {
        echo 'image trop lourde';
      }
    }
    echo "Livre ajouter avec succes" ;
  }
?>