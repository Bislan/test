<br>
<section>
    <form action="<?php echo ROOT;?>rubrique/httModifier/" method="post" >
        <fieldset><legend> Modifier une rubrique </legend>
        
<p><label for="titre">Titre </label><input type="text" name="titre" id="titre" value="<?php echo $donneesEnvoyees->getTitre(); ?>"></p>
<p><label for="texte">Texte </label><br><textarea rows="10" cols="45" name="texte" id="texte"><?php echo $donneesEnvoyees->getTexte(); ?></textarea></p>
<p><label for="id">Id </label><input type="text" name="id" id="id" value="<?php echo $donneesEnvoyees->getId();?>"></p>
<p><input type="submit"  value="SEND" ></p> 
    
    </fieldset>
    
    </form>  
    

    
</section>
<br>







