
<select name="level" class="border border-black">
  <option value="0">niveaux</option>
    <?php
      $genre = $bdd->query('SELECT * from niveaux');
      foreach($genre as $data){
        $id=$data['id'];
        $nom=$data['nom'];?>
        <option value="<?php echo $id?>"><?php echo $nom?></option>
      <?php } ?>
</select>
 