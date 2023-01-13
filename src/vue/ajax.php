<?php

    ob_start();
    date_default_timezone_set("Asia/Manila");
    $action = 'save_result';
    $crud = new ResCrud();
    if ($action == 'save_result') {
        $save = $crud->save_result();
        if($save)
            echo $save;
    }
    ob_end_flush();
    
?>