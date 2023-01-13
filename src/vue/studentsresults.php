<?php

    $st = $_SESSION['student_code'];

?>

<div class="mp-1"> &nbsp; </div>
<div class="mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="mb-4"> &nbsp; </div>
                    </div>
                    <table class="table table-hover">
                        <colgroup>
                            <col width="0%">
                            <col width="10%">
                            <col width="18%">
                            <col width="35%">
                            <col width="10%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Student Code </th>
                                <th> Student Name </th>
                                <th> Class </th>
                                <th> Subjects </th>
                                <th> Average </th>
                                <th> View </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
								$i = 1; 
								$qry = DB::connect()->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class, r.marks_percentage as marks FROM results r inner join classes c on c.id = r.class_id inner join students s on s.student_code = $st order by id asc ");
								$z = $qry->fetch(PDO::FETCH_OBJ);
								$subjects = DB::connect()->query("SELECT * FROM result_items where result_id =".$z->id)->rowCount();
							?>
                            <tr>
                                <th scope="row"> <?php echo $z->id ?> </th>
                                <td> <?php echo $z->student_code ?> </td>
                                <td> <?php echo ucwords($z->name) ?> </td>
                                <td> <?php echo ucwords($z->class) ?> </td>
                                <td> <?php echo $subjects ?> </td>
                                <td> <?php echo $z->marks_percentage ?> </td>
                                <td class="d-flex flex-row">
                                    <div class="btn-group ms-1">
                                        <form action="viewResults" method="post">
                                            <input type="hidden" name="id" value="<?php echo $z->student_code ?>">
                                            <button class="btn btn-sm btn-info text-center view" type="submit"> <i class="fa-solid fa-street-view"></i> </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.status_chk').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 2;
        if ($(this).attr('data-state-stats') !== undefined && $(this).attr('data-state-stats') ==
            'error') {
            $(this).removeAttr('data-state-stats')
            return false;
        }
        var id = $(this).attr('data-id');
        start_load()
        $.ajax({
            url: 'ajax?action=update_result_stats',
            method: 'POST',
            data: {
                id: id,
                status: status
            },
            error: function(err) {
                console.log(err)
                end_load()
            },
            success: function(resp) {
                if (resp == 1) {
                    alert_toast("result status successfully updated.", 'success')
                    end_load()
                } else {
                    alert_toast("Something went wrong while updating the result's status.",
                        'error')
                    $('#status_chk').attr('data-state-stats', 'error').bootstrapToggle(
                        'toggle')
                    end_load()
                }
            }
        })
    })
})
</script>