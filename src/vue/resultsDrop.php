<?php

    if (isset($_POST['id'])) {
        $result = new ResultController();
        $result->dropResult();
    }
    
?>
