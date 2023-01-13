<?php

    $subject = new SubjectController();
    if (isset($_POST['find'])) {
        $result = $subject->findSubject();
    } else {
        $result = $subject->getAllSubject();
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
                            <a href="<?php echo BASE_URL ?>subjectsAdd" class="badge h-75 fs-5 text-center badge-success bg-primary mb-3"> <i class="fa fa-plus text-light"></i> </a>
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
							<col width="30%">
							<col width="40%">
						</colgroup>
                        <thead>
                            <tr>
                            <th scope="col"> # </th>
                            <th scope="col"> Code </th>
                            <th scope="col"> Subject </th>
                            <th scope="col"> Description </th>
                            <th scope="col"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($result as $results): ?>
                            <tr>
                                <th scope="row"> <?php echo $results['id'] ?> </th>
                                <td> <?php echo $results['subject_code'] ?> </td>
                                <td> <?php echo $results['subject'] ?> </td>
                                <td> <?php echo $results['description'] ?> </td>
                                <td class="d-flex flex-row"> 
                                    <form action="subjectsEdit" method="post" class="me-0">
                                        <input type="hidden" name="id" value="<?php echo $results['id'] ?>">
                                        <button class="btn btn-sm btn-warning"> <i class="fa-solid fa-user-pen"></i> </button>
                                    </form>
                                    <form action="subjectsDrop" method="post" class="ms-2">
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

