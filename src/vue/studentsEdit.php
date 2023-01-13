<?php

    $student = new StudentController();
    if (isset($_POST['id'])) {
        $result = $student->getOneStudent();
    } else {
        Redirect::to('home');
    }
    if (isset($_POST['submit'])) {
        $result = $student->updateStudent();
    }

?>
<div class="mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <div class="modal-header mb-4">
                        <h5 class="modal-title"> Add Student </h5>
                    </div>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $result->id ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div id="msg" class=""></div>
                                <div class="form-group text-dark">
                                    <div class="form-group">
                                        <label for="" class="control-label">Student ID #</label>
                                        <input type="text" class="form-control form-control" name="student_code" value="<?php echo $result->student_code ?>" required>
                                    </div>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group mt-1">
                                        <label for="" class="control-label">First Name</label>
                                        <input type="text" class="form-control form-control" name="firstname" value="<?php echo $result->firstname ?>" required>
                                    </div>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group mt-1">
                                        <label for="" class="control-label">Middle Name</label>
                                        <input type="text" class="form-control form-control" name="middlename" value="<?php echo $result->middlename ?>">
                                    </div>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group mt-1">
                                        <label for="" class="control-label">Last Name</label>
                                        <input type="text" class="form-control form-control" name="lastname" value="<?php echo $result->lastname ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Gender</label>
                                    <select name="gender" id="" class="custom-select custom-select-sm form-control" required>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group">
                                        <label for="" class="control-label">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="4" class="form-control"><?php echo $result->address ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group text-dark">
                                    <div class="form-group">
                                        <label for="" class="control-label">Class</label>
                                        <select name="class_id" id="" class="form-control select2 select2-sm" required>
                                            <option></option>
                                            <?php 
                                                $classes = DB::connect()->query("SELECT * FROM classes order by level asc,section asc ");
                                                while($row = $classes->fetch(PDO::FETCH_ASSOC)):
                                            ?>
                                            <option value="<?php echo $row['id'] ?>"
                                                <?php echo isset($result->class_id) && $result->class_id == $row['id'] ? "selected" : '' ?>>
                                                <?php echo ucwords($row['level'].'-'.$row['section']) ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4 mt-4 justify-content-end">
                            <button class="btn btn-primary" type="submit" name="submit"> Valider </button>
                            <a href="<?php echo BASE_URL ?>students" class="btn btn-outline-secondary"> annuler </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>