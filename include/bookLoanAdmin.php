<?php 
@ $valid = $_POST['waiting'];

if($user == 1 || $user == 2){
  if(isset($valid)){
    $choose = implode($valid);
    // $choose = implode($retour);
    $bookView = $bdd->query("SELECT * FROM emprunt INNER JOIN book ON emprunt.book=book.id inner join users on emprunt.user=users.id WHERE book.id='$choose'");
    foreach($bookView as $data){
      $title = $data['title'];
      $cover = $data['cover'];
      $parution = $data['parution'];
      $info = $data['info'];

      $name = $data['username'];
      $email = $data['email'];

      $id = $data['id_loan'];

      $Demand = $data['endDemand'];
      $Loan = $data['endLoan'];
      
      $yearDemand = substr($Demand, 0,4);
      $monthDemand = substr($Demand, 5,2);
      $dayDemand = substr($Demand, 8,2);

      $yearLoan = substr($Loan, 0,4);
      $monthLoan = substr($Loan, 5,2);
      $dayLoan = substr($Loan, 8,2);

      $endDemand = $dayDemand."/".$monthDemand."/".$yearDemand;
      $endLoan = $dayLoan."/".$monthLoan."/".$yearLoan;


      if($Demand != null){
        echo "<fieldset class='ml-2 border border-black w-1/4'>";
        echo "<legend class='font-bold text-center'>".$title." </legend>";
        echo "<div class='flex justify-center align-center'>";
          echo "<div class='flex flex-col align-center justify-center mr-4'>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Autheur: </h3>";
              echo "<h3>".$author."</h3>";
            echo "</div>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Date de parution: </h3>";
              echo "<h3>".$parution."</h3>";
            echo "</div>";
          echo "</div>";
          echo "<img src='../$cover' class='w-2/5 rounded-br-lg rounded-tr-lg cover'/>";
        echo "</div>";
        echo "<div class='flex justify-center align-center items-center flex-col'>";
          echo "<h3 class='underline'>Description :</h3>";
          echo "<p class='overflow-scroll h-96 w-5/6'>".$info."</p>";
          echo "<div class='flex justify-center flex-col'>";
            echo "<p>nom/prenom: ".$name."</p>";
            echo "<p>email: ".$email."</p>";
            echo "<p>fin demande: ".$endDemand."</p>";
          echo "</div>";
          echo "<button class='emprunter font-bold text-white border-2 mt-3 rounded p-0.5' value='$id' name='loan'>Valider emprunt</button>";
        echo "</div>";
      echo "</fieldset>";
      }
      if($Loan != null){
        echo "<fieldset class='ml-2 border border-black w-1/4'>";
        echo "<legend class='font-bold text-center'>".$title." </legend>";
        echo "<div class='flex justify-center align-center'>";
          echo "<div class='flex flex-col align-center justify-center mr-4'>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Autheur: </h3>";
              echo "<h3>".$author."</h3>";
            echo "</div>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Date de parution: </h3>";
              echo "<h3>".$parution."</h3>";
            echo "</div>";
          echo "</div>";
          echo "<img src='../$cover' class='w-2/5 rounded-br-lg rounded-tr-lg cover'/>";
        echo "</div>";
        echo "<div class='flex justify-center align-center items-center flex-col'>";
          echo "<h3 class='underline'>Description :</h3>";
          echo "<p class='overflow-scroll h-96 w-5/6'>".$info."</p>";
          echo "<div class='flex justify-center flex-col'>";
            echo "<p>nom/prenom: ".$name."</p>";
            echo "<p>email: ".$email."</p>";
            echo "<p>fin emprunt: ".$endLoan."</p>";
          echo "</div>";
          echo "<button class='emprunter font-bold text-white border-2 mt-3 rounded p-0.5' value='$id' name='retour'>Retour</button>";
        echo "</div>";
      echo "</fieldset>";
      }
    }
  }

  @ $save = $_POST['loan'];
  @ $retour = $_POST['retour'];
  
  if(isset($save)){
    $emprunt = date("Y/m/d",time()+(1*1814400));
    $up = $bdd->prepare('UPDATE emprunt set demand=null , endDemand=null , loan =?, endLoan=? WHERE id_loan='.$save.'');
    $up -> execute([$today,$emprunt]);  
    echo $today.'--'.$emprunt;  
  }

  if(isset($retour)){
    echo $retour;
    $updateStat = $bdd->query('UPDATE book inner join emprunt on book.id=emprunt.book set statu=1 where id_loan='.$retour.'');
    $delete = $bdd->prepare('DELETE FROM emprunt where id_loan='.$retour.'');
    $delete -> execute();
    header("Refresh:0");
  }
}
if($user == 3){
  if(isset($valid)){
    $choose = implode($valid);
    // $choose = implode($retour);
    $bookView = $bdd->query("SELECT * FROM emprunt INNER JOIN book ON emprunt.book=book.id WHERE book.id='$choose'");
    foreach($bookView as $data){
      $title = $data['title'];
      $cover = $data['cover'];
      $parution = $data['parution'];
      $info = $data['info'];

      $id = $data['id_loan'];

      $Demand = $data['endDemand'];
      $Loan = $data['endLoan'];
      
      $yearDemand = substr($Demand, 0,4);
      $monthDemand = substr($Demand, 5,2);
      $dayDemand = substr($Demand, 8,2);

      $yearLoan = substr($Loan, 0,4);
      $monthLoan = substr($Loan, 5,2);
      $dayLoan = substr($Loan, 8,2);

      $endDemand = $dayDemand."/".$monthDemand."/".$yearDemand;
      $endLoan = $dayLoan."/".$monthLoan."/".$yearLoan;


      if($Demand != null){
        echo "<fieldset class='ml-2 border border-black w-1/4'>";
        echo "<legend class='font-bold text-center'>".$title." </legend>";
        echo "<div class='flex justify-center align-center'>";
          echo "<div class='flex flex-col align-center justify-center mr-4'>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Autheur: </h3>";
              echo "<h3>".$author."</h3>";
            echo "</div>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Date de parution: </h3>";
              echo "<h3>".$parution."</h3>";
            echo "</div>";
          echo "</div>";
          echo "<img src='../$cover' class='w-2/5 rounded-br-lg rounded-tr-lg cover'/>";
        echo "</div>";
        echo "<div class='flex justify-center align-center items-center flex-col'>";
          echo "<h3 class='underline'>Description :</h3>";
          echo "<p class='overflow-scroll h-96 w-5/6'>".$info."</p>";
          echo "<div class='flex justify-center flex-col'>";
            echo "<p>fin demande: ".$endDemand."</p>";
          echo "</div>";
        echo "</div>";
      echo "</fieldset>";
      }
      if($Loan != null){
        echo "<fieldset class='ml-2 border border-black w-1/4'>";
        echo "<legend class='font-bold text-center'>".$title." </legend>";
        echo "<div class='flex justify-center align-center'>";
          echo "<div class='flex flex-col align-center justify-center mr-4'>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Autheur: </h3>";
              echo "<h3>".$author."</h3>";
            echo "</div>";
            echo "<div class='flex flex-row'>";
              echo "<h3 class='mr-2'>Date de parution: </h3>";
              echo "<h3>".$parution."</h3>";
            echo "</div>";
          echo "</div>";
          echo "<img src='../$cover' class='w-2/5 rounded-br-lg rounded-tr-lg cover'/>";
        echo "</div>";
        echo "<div class='flex justify-center align-center items-center flex-col'>";
          echo "<h3 class='underline'>Description :</h3>";
          echo "<p class='overflow-scroll h-96 w-5/6'>".$info."</p>";
          echo "<div class='flex justify-center flex-col'>";
            echo "<p>fin emprunt: ".$endLoan."</p>";
          echo "</div>";
        echo "</div>";
      echo "</fieldset>";
      }
    }
  }
}
?>