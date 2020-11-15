<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">FEES COLLECTION</h1>
                <a href="fees_recipt.php" class="btn btn-primary btn-sm pull-right">Generate Fees Vaucher <i class="glyphicon glyphicon-arrow-right"></i></a>

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Students Data
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>

                                    <th>Roll No.</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Fees</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Roll No.</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Fees</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM `students`";
                                $result = mysqli_query($connection, $sql);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td>100<?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['class'];
                                            $class = $row['class'];
                                            ?></td>
                                        <?php
                                        $sql_class = "SELECT * FROM `classes` where class_name='$class'";
                                        $result_class = mysqli_query($connection, $sql_class);
                                        ?>
                                        <td> <?php while ($row_class = mysqli_fetch_assoc($result_class)) {
                                                    echo $row_class['monthly_fees'];
                                                }
                                                ?></td>
                                        <td>balance</td>
                                        <td><a href="fees_collection.php" class="btn btn-primary btn-sm pull-right">Take Fee<i class="glyphicon glyphicon-arrow-right"></i></a></td>
                                    </tr>
                                <?php
                                } ?>




                            </tbody>
                        </table>
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