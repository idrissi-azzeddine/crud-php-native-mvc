<?php

    if (isset($_POST['id'])) {
        $classe = new ClasseController();
        $classe->dropClasse();
    }
    
?>
