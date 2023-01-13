<?php

    // die($_POST['id']);
    $qry = DB::connect()->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class,s.gender FROM results r inner join classes c on c.id = r.class_id inner join students s on s.id = r.student_id where r.id = " . $_POST['id'])->fetch(PDO::FETCH_OBJ);
    foreach ($qry as $k => $v) {
        $$k = $v;
    }

?>
<div class="mp-1"> &nbsp; </div>
<div class="mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="container-fluid mt-5" id="printable">
                        <table width="100%">
                            <tr>
                                <td width="50%"> Student ID # : <b><?php echo $student_code ?> </b> </td>
                                <td width="50%"> Class: <b> <?php echo $class ?> </b> </td>
                            </tr>
                            <tr>
                                <td width="50%"> Student Name : <b> <?php echo ucwords($name) ?> </b> </td>
                                <td width="50%"> Gender : <b> <?php echo ucwords($gender) ?> </b> </td>
                            </tr>
                        </table>
                        <hr>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Subject Code </th>
                                    <th> Subject </th>
                                    <th> Mark </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $items = DB::connect()->query("SELECT r.*,s.subject_code,s.subject FROM result_items r inner join subjects s on s.id = r.subject_id where result_id = $id  order by s.subject_code asc");
                                while ($row = $items->fetch(PDO::FETCH_ASSOC)) :
                                ?>
                                    <tr>
                                        <td> <?php echo $row['subject_code'] ?> </td>
                                        <td> <?php echo ucwords($row['subject']) ?> </td>
                                        <td class="text-center"> <?php echo number_format($row['mark']) ?> </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2"> Average </th>
                                    <th class="text-center"> <?php echo number_format($marks_percentage, 2) ?> </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class=" display p-0 mt-5">
                        <button type="button" class="btn btn-success" id="print"> <i class="fa fa-print"> </i> Print </button>
                        <a class="btn btn-outline-secondary h-75 me-3" href="<?php echo BASE_URL ?>studentsresults"> annuler </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #uni_modal .modal-footer {
        display: none
    }

    #uni_modal .modal-footer.display {
        display: flex
    }
</style>
<noscript>
    <style>
        table.table {
            width: 100%;
            border-collapse: collapse;
        }

        table.table tr,
        table.table th,
        table.table td {
            border: 1px solid;
        }

        .text-cnter {
            text-align: center;
        }
    </style>
    <h3 class="text-center"><b> Student Result </b></h3>
</noscript>
<script>
    $('#print').click(function() {
        var ns = $('noscript').clone()
        var content = $('#printable').clone()
        ns.append(content)
        var nw = window.open('', '', 'height=700,width=900')
        nw.document.write(ns.html())
        nw.document.close()
        nw.print()
        setTimeout(function() {
            nw.close()
            end_load()
        }, 750)
    })
</script>