

<a href="<?php echo ROOT;?>rubrique/add/<?php echo $donneesEnvoyees->getID();?>">Ajouter</a>&nbsp;
<section>
    <h1><?php echo $donneesEnvoyees->getTitre(); ?></h1>
    <p> <?php echo $donneesEnvoyees->getTexte(); ?></p>
    <a href="<?php echo ROOT;?>rubrique/edit/<?php echo $donneesEnvoyees->getID();?>">Modifier</a>&nbsp;
    
    <a href="<?php echo ROOT;?>rubrique/dell/<?php echo $donneesEnvoyees->getID();?>">Effacé</a>&nbsp;
      
    
</section>