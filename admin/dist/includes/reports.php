<style>
    .add td:nth-child(2) {
        width: 35%;
    }

    form#signupForm1 {
        margin: auto;
    }
    .reports a {
    display: block;
    color: black;
    transition: 0.2s all ease-in-out;
    font-size: 23px;
    font-family: cursive;
}
.reports a:hover{
    color: #4c66a0 !important;
}
</style>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">Staff Salary</h1>
                <?php
                echo (isset($_GET['action']) && @$_GET['action'] == "add" || @$_GET['action'] == "edit") ?
                    '<a href="salary_distibute.php" class="btn btn-primary btn-sm pull-right">Back <i class="glyphicon glyphicon-arrow-right"></i></a>' :
                    '<a href="salary_distibute.php?action=add" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add Salary </a>';
                ?>
            </div>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    
                <?php
                if (!isset($_GET['action']) && @$_GET['action'] != "add") {
                    echo '<li class="breadcrumb-item active">Staff Salary</li>';
                }
                else{
                echo '<li class="breadcrumb-item"><a href="salary_distibute.php">Staff salary</a></li>
                <li class="breadcrumb-item active">Add Salary</li>';
                }
                ?>
            </ol>

            <div class="reports">

                <a href="fees_collection_report.php">Fees Collection Report</a>
                <a href="#">Admission Report</a>
                <a href="salary_reports.php">Salary Report</a>
                <a href="#">Transections Report</a>

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

<script>
    // let submit = document.getElementsByClassName("submit");
    // submit.addEventListener("click", (e) => {
    //     $('#editmodal').modal('toggle');
    // })
</script>