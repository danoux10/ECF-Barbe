<?php 
  @ $titre = $_POST['bar'];
  @ $genre = $_POST['genre'];
  
  if(isset($_POST['search'])){
    if(!empty($titre)){
      $book = $bdd->query("SELECT * FROM book WHERE title='$titre'");
      foreach($book as $info){
        $title = $info['title'];
        $cover = $info['cover'];
        $id = $info['id'];
        $statu = $info['statu'];
        if ($statu == 0) {
          echo "<div class='flex flex-col items-center ml-1 mr-1'>";
            echo "<button type='submit' name='book[]' value='$id'>";
              echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg filter grayscale lg:w-28 lg:h-40 md:h-30'>";
            echo "</button>";
          echo"</div>";
        }else{
          echo "<div class='flex flex-col items-center ml-1 mr-1'>";
            echo "<button type='submit'  name='book[]' value='$id'>";
              echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg lg:w-28 lg:h-40 md:h-30'>";
            echo "</button>";
          echo"</div>";
        }
      }
    }
    if($genre != 0){
      $book = $bdd->query("SELECT * FROM book INNER JOIN genre ON book.style=genre.id_genre WHERE style='$genre'");
      foreach($book as $info){
        $cover = $info['cover'];
        $title = $info['title'];
        $id = $info['id'];
        $statu = $info['statu'];
        if ($statu == 0) {
          echo "<div class='flex flex-col items-center ml-1 mr-1'>";
            echo "<button type='submit' name='book[]' value='$id'>";
              echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg filter grayscale lg:w-28 lg:h-40 md:h-30'>";
            echo "</button>";
          echo"</div>";
        }else{
          echo "<div class='flex flex-col items-center ml-1 mr-1'>";
            echo "<button type='submit'  name='book[]' value='$id'>";
              echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg lg:w-28 lg:h-40 md:h-30'>";
            echo "</button>";
          echo"</div>";
        }
      }
    }
  }else{
    $book = $bdd->query('SELECT * FROM book');
    foreach($book as $info){
      $cover = $info['cover'];
      $title = $info['title'];
      $id = $info['id'];
      $statu = $info['statu'];
      if ($statu == 0) {
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
          echo "<button type='submit' name='book[]' value='$id'>";
            echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg filter grayscale lg:w-28 lg:h-40 md:h-30'>";
          echo "</button>";
        echo"</div>";
      }else{
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
          echo "<button type='submit'  name='book[]' value='$id'>";
            echo "<img src='../$cover' title='$title' class='rounded-br-lg rounded-tr-lg lg:w-28 lg:h-40 md:h-30'>";
          echo "</button>";
        echo"</div>";
      } 
    }
  }
?>