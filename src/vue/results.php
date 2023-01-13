<div class="mp-1"> &nbsp; </div>
<div class="mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="">    
                            <a href="<?php echo BASE_URL ?>resultsAdd" class="badge h-75 fs-5 text-center badge-success bg-primary mb-3"> <i class="fa fa-plus text-light"></i> </a>
                        </div>
                        <form method="post" class="h-25 d-flex mx-5 float-right justify-content-end flex-row">
                            <input class=" rounded-0 rounded-start border-secondary ps-2 form-control" type="text" name="search" placeholder="Recherche">
                            <button class="btn btn-primary btn-sm border border-primary rounded-0 rounded-end " type="submit" name="find"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                        </form>
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
								<th class="text-center">#</th>
								<th>Student Code</th>
								<th>Student Name</th>
								<th>Class</th>
								<th>Subjects</th>
								<th>Average</th>
								<th>Action</th>
							</tr>
						</thead>
                        <tbody>
							<?php 
								$i = 1; 
								$qry = DB::connect()->query("SELECT r.*,concat(s.firstname,' ',s.middlename,' ',s.lastname) as name,s.student_code,concat(c.level,'-',c.section) as class FROM results r inner join classes c on c.id = r.class_id inner join students s on s.id = r.student_id order by id asc ");
								while($row= $qry->fetch(PDO::FETCH_ASSOC)):
								$subjects = DB::connect()->query("SELECT * FROM result_items where result_id =".$row['id'])->rowCount();
							?>
                            <tr>
                                <th scope="row"> <?php echo $i++ ?> </th>
                                <td> <?php echo $row['student_code'] ?> </td>
                                <td> <?php echo ucwords($row['name']) ?> </td>
								<td> <?php echo ucwords($row['class']) ?> </td>
								<td> <?php echo $subjects ?> </td>
								<td> <?php echo $row['marks_percentage'] ?> </td>
                                <td class="d-flex flex-row"> 
                                <div class="btn-group">
									<form action="resultsEdit" method="post" class="ms-2">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
										<input type="hidden" name="student_code" value="<?php echo $row['student_code'] ?>">
                                        <button class="btn btn-sm btn-warning"> <i class="fa-solid fa-user-pen"></i> </button>
                                    </form>
                                    <form action="resultsDrop" method="post" class="ms-2">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-user-minus"></i> </button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
	

	$('.view_result').click(function(){
		uni_modal("Result","view_result.php?id="+$(this).attr('data-id'),'mid-large')
	})
	$('.status_chk').change(function(){
		var status = $(this).prop('checked') == true ? 1 : 2;
		if($(this).attr('data-state-stats') !== undefined && $(this).attr('data-state-stats') == 'error'){
			$(this).removeAttr('data-state-stats')
			return false;
		}
		// return false;
		var id = $(this).attr('data-id');
		start_load()
		$.ajax({
			url:'ajax?action=update_result_stats',
			method:'POST',
			data:{id:id,status:status},
			error:function(err){
				console.log(err)
					end_load()
			},
			success:function(resp){
				if(resp == 1){
					alert_toast("result status successfully updated.",'success')
					end_load()
				}else{
					alert_toast("Something went wrong while updating the result's status.",'error')
					$('#status_chk').attr('data-state-stats','error').bootstrapToggle('toggle')
					end_load()
				}
			}
		})
	})
})
</script>