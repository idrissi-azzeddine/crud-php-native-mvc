<?php

    ini_set('display_errors', 1);
    class ResCrud {

        function save_result(){
            extract($_POST);
            $data = "";
            foreach($_POST as $k => $v){
                if(!in_array($k, array('id','mark','subject_id')) && !is_numeric($k)){
                    if(empty($data)){
                        $data .= " $k='$v' ";
                    }else{
                        $data .= ", $k='$v' ";
                    }
                }
            }
            
            $chk = DB::connect()->query("SELECT * FROM results where student_id ='$student_id' and class_id='$class_id' and id != '$id' ");
            if($chk->rowCount() > 0){
                return 2;
                exit;
            }
            if(empty($id)){
                $save = DB::connect()->query("INSERT INTO results set $data");
            }else{
                $save = DB::connect()->query("UPDATE results set $data where id = $id");
            }
            if($save){
                // $id = empty($id) ? DB::connect()->$insert_id : $id;
                DB::connect()->query("DELETE FROM result_items where result_id = $id");
                foreach($subject_id as $k => $v){
                    $data= " result_id = $id ";
                    $data.= ", subject_id = $v ";
                    $data.= ", mark = '{$mark[$k]}' ";
                    DB::connect()->query("INSERT INTO result_items set $data");
                }
                return 1;
                Redirect::to('results');
            }
        }      
          
    }
?>
