<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">Staff Salary</h1>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="teacher.php">Staff</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>
            <div class="card mb-4">
                <div class="row">

                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo "Add Staff" ?>
                            </div>
                            <form action="teacher.php" method="post" id="signupForm1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="panel-body">
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border">Details:</legend>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="Old">Name* </label>

                                            <div class="col-sm-10">
                                                <select class="form-control" id="sname" name="name">
                                                    <?php
                                                    $sql = "SELECT * FROM `teacher` ";
                                                    $result = mysqli_query($connection, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="sname" name="name">
                                                    <?php
                                                    $sql = "SELECT * FROM `teacher` ";
                                                    $result = mysqli_query($connection, $sql);
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <div class="col-sm-8 col-sm-offset-2">
                                                <input type="hidden" name="id">
                                                <input type="hidden" name="action">

                                                <button type="submit" name="save" class="btn btn-primary">Save </button>



                                            </div>
                                        </div>





                                </div>
                            </form>

                        </div>
                    </div>


                </div>
            </div>




        </div>
    </main>



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