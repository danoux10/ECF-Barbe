<?php 
@ $user = $_SESSION['niveaux'];
@ $userid = $_SESSION['id'];


  if($user == 3){
    $bookView = $bdd->query('SELECT * FROM emprunt INNER JOIN book ON emprunt.book=book.id WHERE user='.$userid.'');
    foreach($bookView as $data){
      $title = $data['title'];
      $cover = $data['cover'];
      $id = $data['book'];
      $author = $data['author'];
      $description = $data['book'];
      $id_loan = $data['id_loan'];
      $endDemand = $data['endDemand'];
      $endLoan = $data['endLoan'];
      $loan = $data['loan'];
      $yearDemand = substr($endDemand, 0,4);
      $monthDemand = substr($endDemand, 5,2);
      $dayDemand = substr($endDemand, 8,2);

      $yearLoan = substr($endLoan, 0,4);
      $monthLoan = substr($endLoan, 5,2);
      $dayLoan = substr($endLoan, 8,2);
      

      @ $dateDemand = mktime(0,0,0,$monthDemand,$dayDemand,$yearDemand);
      @ $dateLoan = mktime(0,0,0,$monthLoan,$dayLoan,$yearLoan);

      if($endDemand != null){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
          echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
            echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-gray-500'>";
          echo "</button>";
        echo"</div>";
      }

      if($loan != null && $dateLoan > $todayTime){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
        echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
          echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-green-500'>";
        echo "</button>";
      echo"</div>";
      }
      if($endLoan !=null && $dateLoan < $todayTime){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
        echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
          echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-red-500'>";
        echo "</button>";
      echo"</div>";
      }
    }
  }
  if($user == 1 || $user==2){
    $bookView = $bdd->query('SELECT * FROM emprunt INNER JOIN book ON emprunt.book=book.id');
    foreach($bookView as $data){
      $title = $data['title'];
      $cover = $data['cover'];
      $id = $data['book'];
      $author = $data['author'];
      $description = $data['book'];
      $id_loan = $data['id_loan'];
      $endDemand = $data['endDemand'];
      $endLoan = $data['endLoan'];
      $loan = $data['loan'];
      $yearDemand = substr($endDemand, 0,4);
      $monthDemand = substr($endDemand, 5,2);
      $dayDemand = substr($endDemand, 8,2);

      $yearLoan = substr($endLoan, 0,4);
      $monthLoan = substr($endLoan, 5,2);
      $dayLoan = substr($endLoan, 8,2);
      

      @ $dateDemand = mktime(0,0,0,$monthDemand,$dayDemand,$yearDemand);
      @ $dateLoan = mktime(0,0,0,$monthLoan,$dayLoan,$yearLoan);

      if($endDemand != null){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
          echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
            echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-gray-500'>";
          echo "</button>";
        echo"</div>";
      }

      if($loan != null && $dateLoan > $todayTime){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
        echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
          echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-green-500'>";
        echo "</button>";
      echo"</div>";
      }
      if($endLoan !=null && $dateLoan < $todayTime){
        echo "<div class='flex flex-col items-center ml-1 mr-1'>";
        echo "<button type='submit' title='$title'  name='waiting[]' value='$id'>";
          echo "<img src='../$cover' class='w-28 h-40 rounded-br-lg rounded-tr-lg border-4 border-red-500'>";
        echo "</button>";
      echo"</div>";
      }
    }
  }
?>