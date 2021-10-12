<select name="genre" class="border border-black">
  <option value="0">genre</option>
    <?php
      $genre = $bdd->query('SELECT * from genre');
      foreach($genre as $data){
        $id=$data['id_genre'];
        $nom=$data['nom'];?>
        <option value="<?php echo $id?>"><?php echo $nom?></option>
      <?php } ?>
</select>