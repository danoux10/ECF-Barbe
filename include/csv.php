<?php
include '../config/bdd.php';
   header('Content-Type: text/csv;');
   header('Content-Disposition: attachement; filename="book.csv"');

   $book = $bdd->query('SELECT * FROM book INNER JOIN genre ON book.style=genre.id_genre');
?>
"id";"titre";"auteur";"genre";info";"parution";

<?php 
  foreach($book as $data){
    $id = $data['id'];
    $title = $data['title'];
    $author = $data['author'];
    $style = $data['nom'];
    $info = $data['info'];
    $date = $data['parution'];;
    
    $year = substr($date, 0,4);
    $month = substr($date, 5,2);
    $day = substr($date, 8,2);
    $parution = $day.'/'.$month.'/'.$year;

    echo $id.';'.$title.';'.$author.';'.$style.';'.$info.';'.$parution.'\n';
  }
?>    
