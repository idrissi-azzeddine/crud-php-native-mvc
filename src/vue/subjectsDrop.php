<?php

    if (isset($_POST['id'])) {
        $subject = new SubjectController();
        $subject->dropSubject();
    }
    
?>
