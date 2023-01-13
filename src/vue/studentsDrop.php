<?php

    if (isset($_POST['id'])) {
        $student = new StudentController();
        $student->dropStudent();
    }
    
?>
