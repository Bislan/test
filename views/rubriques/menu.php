<ul>
    <?php 
        foreach($donneesEnvoyees as $rubrique) {
            echo '<li><a href="'.ROOT.'rubrique/index/' . 
                 $rubrique->getId() . '">' .
                 $rubrique->getTitre() . '</a></li>';
        }
    ?>
</ul>