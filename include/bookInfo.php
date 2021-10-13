<?php 
        @ $bookChoose = $_POST['book'];
        if(isset($bookChoose)){
          $choose = implode($bookChoose);
          // echo $choose;
          $infoBook = $bdd->query('SELECT * FROM book INNER JOIN genre ON book.style=genre.id_genre WHERE book.id='.$choose.'');
          foreach($infoBook as $bookData){
            $id = $bookData['id'];
            $title = $bookData['title'];
            $author = $bookData['author'];
            $date = $bookData['parution'];
            $genre = $bookData['nom'];
            $cover = $bookData['cover'];
            $info = $bookData['info'];
            $statu = $bookData['statu'];

            $year = substr($date, 0,4);
            $month = substr($date, 5,2);
            $day = substr($date, 8,2);
            $parution = $day.'/'.$month.'/'.$year;

            if($statu == 0){
              echo "<fieldset class='ml-2 border border-black lg:w-1/4 md:w-full'>";
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
                  echo "<div class='flex flex-row'>";
                    echo "<h3 class='mr-2'>genre: </h3>";
                    echo "<h3>".$genre."</h3>";
                  echo "</div>";
                echo "</div>";
                echo "<img src='../$cover' class='lg:w-2/5 md:w-1/5 rounded-br-lg rounded-tr-lg cover'/>";
              echo "</div>";
              echo "<div class='flex justify-center align-center items-center flex-col'>";
                echo "<h3 class='underline'>Description :</h3>";
                echo "<p class='overflow-scroll lg:h-96 md:h-52 w-5/6'>".$info."</p>";
                echo "<button type='disabled' class='emprunter font-bold text-white border-2 mt-3 rounded p-0.5' value='$id' name=''>Déjà emprunter</button>";
              echo "</div>";
            echo "</fieldset>";
            }else{
              echo "<fieldset class='ml-2 border border-black lg:w-1/4 md:w-full'>";
              echo "<legend class='font-bold'>".$title." </legend>";
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
                  echo "<div class='flex flex-row'>";
                    echo "<h3 class='mr-2'>genre: </h3>";
                    echo "<h3>".$genre."</h3>";
                  echo "</div>";
                echo "</div>";
                echo "<img src='../$cover' class='lg:w-2/5 md:w-1/5 rounded-br-lg rounded-tr-lg cover'/>";
              echo "</div>";
              echo "<div class='flex justify-center align-center items-center flex-col'>";
                echo "<h3 class='underline'>Description :</h3>";
                echo "<p class='overflow-scroll lg:h-96 md:h-52 w-5/6'>".$info."</p>";
                echo "<button type='submit' class='valid font-bold text-white border-2 mt-3 rounded p-0.5' value='$id' name='loan'>Emprunter</button>";
              echo "</div>";
            echo "</fieldset>";
            }
          }
        }
        date_default_timezone_set('Europe/Paris');
        $demand = date("Y/m/d");
        $endDemand = date("Y/m/d",time()+(1*259200));
        $user = $_SESSION['id'];
        @ $loan = $_POST['loan'];
        if (isset($loan)) {
          $update = $bdd ->query('UPDATE book SET statu=false WHERE id='.$loan.'');
          $newLoan = $bdd ->prepare('INSERT INTO emprunt SET book=?, user=?, demand=?, endDemand=?');
          $newLoan->execute([$loan,$user,$demand, $endDemand]);
          // echo $loan.'--'.$user.'--'.$demand.'--'.$endDemand;
        }
      ?>