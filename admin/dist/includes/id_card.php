<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4 hideMe">Student Fee Manager</h1>
                <h1 class="mt-4 showOnPrint">DAR-UL-ISLAH ACADEMY</h1>
                <!-- <div class="header_buttons hideMe">
                    
                </div> -->
            </div>
            <ol class="breadcrumb mb-4 hideMe">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="fees_collection.php">Fees</a></li>
                <li class="breadcrumb-item active">Generate Fee Vaucher</li>
            </ol>
            <div class="row">
                <div class="col-lg-3">
                    <a href="fees_recipt.php?action=student" class="btn btn-outline-primary" data-toggle="modal" data-target="#studentModal">Student Vise</a>

                </div>
                <div class="col-lg-3">
                    <a href="fees_recipt.php?action=class" class="btn btn-outline-success" data-toggle="modal" data-target="#classModal">Class Vise</a>

                </div>
            </div>
            <!-- <div class="card mb-4">

          </div> -->

        </div>
    </main>

    <div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="studentModalLabel">Issue Identity Card (Student) </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="id_card.php" method="post">
                    <div class="modal-body">
                        <div class="student_vise">
                            <input type="hidden" name="std_vise" id="std_vise" value="student wise">

                            <div class="form-group">
                                <label for="class">Class:</label>
                                <select class="form-control" id="class" name="class" onchange="student_class(this.value)">
                                    <option value="">select...</option>
                                    <?php
                                    $sql = "SELECT * FROM `classes`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['class_name'] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="student">Student:</label>
                                <select class="form-control" id="students_list" name="std_id" onchange="tutionFees(this.value)">
                                    <option value="">select..</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- </div> -->
                    <!-- </div> -->
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="classModal" tabindex="-1" aria-labelledby="classModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="classModalLabel">Issue Identity Card (Whole Class)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="id_card.php" method="post">
                    <div class="modal-body">
                        <div class="student_vise">
                            <input type="hidden" name="class_vise" id="class_vise" value="class wise">
                            <div class="form-group">

                                <label for="class">Class:</label>
                                <select class="form-control" id="class_a" name="class">
                                    <option value="">select...</option>
                                    <?php
                                    $sql = "SELECT * FROM `classes`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['id'] . '">' . $row['class_name'] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy;M. Emmad Sadiq</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>