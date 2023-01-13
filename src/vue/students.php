<?php

	$student = new StudentController();
	if (isset($_POST['find'])) {
		$result = $student->findStudent();
	} else {
		$result = $student->getAllStudent();
	}

?>

<div class="mp-1"> &nbsp; </div>
<div class="mt-4">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="d-flex flex-row justify-content-between">
                        <div class="">    
                            <a href="<?php echo BASE_URL ?>studentsAdd" class="badge h-75 fs-5 text-center badge-success bg-primary mb-3"> <i class="fa fa-plus text-light"></i> </a>
                        </div>
                        <form method="post" class="h-25 d-flex mx-5 float-right justify-content-end flex-row">
                            <input class=" rounded-0 rounded-start border-secondary ps-2 form-control" type="text" name="search" placeholder="Recherche">
                            <button class="btn btn-primary btn-sm border border-primary rounded-0 rounded-end " type="submit" name="find"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                        </form>
                    </div>
                    <table class="table table-hover">
						<colgroup>
							<col width="10%"> 
							<col width="15%"> 
							<col width="25%">
							<col width="45%">
						</colgroup>
                        <thead>
                            <tr>
                            <th scope="col"> # </th>
							<th scope="col"> Student ID </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Class </th>
							<th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $results): ?>
                            <tr>
                                <th scope="row"> <?php echo $results['id'] ?> </th>
                                <td> <?php echo $results['student_code'] ?> </td>
                                <td> <?php echo ucwords($results['name']) ?> </td>
                                <td> <?php echo ucwords($results['class']) ?> </td>
                                <td class="d-flex flex-row">
                                    <form action="studentsEdit" method="post" class="me-0">
                                        <input type="hidden" name="id" value="<?php echo $results['id'] ?>">
                                        <button class="btn btn-sm btn-warning"> <i class="fa-solid fa-user-pen"></i> </button>
                                    </form>
                                    <form action="studentsDrop" method="post" class="ms-2">
                                        <input type="hidden" name="id" value="<?php echo $results['id'] ?>">
                                        <button class="btn btn-sm btn-danger"> <i class="fa-solid fa-user-minus"></i> </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>