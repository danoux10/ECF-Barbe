<?php
  date_default_timezone_set('Europe/Paris');
  $todayTime = time();
  $today = date("Y/m/d");

  $maj = $bdd->query('SELECT * FROM emprunt');
  foreach($maj as $dir){
    $idDemand = $dir['id_loan'];
    $endDemand = $dir['endDemand'];

    $yearDemand = substr($endDemand, 0,4);
    $monthDemand = substr($endDemand, 5,2);
    $dayDemand = substr($endDemand, 8,2);

    @ $dateDemand = mktime(0,0,0,$monthDemand,$dayDemand,$yearDemand);
    
    if($endDemand !=null && $dateDemand<$todayTime){
      $sup = $bdd->prepare('DELETE FROM emprunt WHERE id_loan='.$idDemand.'');
      $updateStat = $bdd->query('UPDATE book inner join emprunt on book.id=emprunt.book set statu=1 where id_loan='.$idDemand.'');
      $sup ->execute();
    }
  }
?>
