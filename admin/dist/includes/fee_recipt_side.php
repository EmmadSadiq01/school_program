<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <div class="page_header">
                <h1 class="mt-4">FEES COLLECTION</h1>
                <!-- <a href="#" class="btn btn-primary btn-sm pull-right">Generate Fees Vaucher <i class="glyphicon glyphicon-arrow-right"></i></a> -->

            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Student</li>
            </ol>

            <div class="card mb-4">
               <a href="fees_recipt.php?action=student">Student Vise</a>
               <a href="fees_recipt.php?action=class">Class Vise</a>
               <?php
              
            if (isset($_GET['action']) && @$_GET['action'] == "student") {
            ?>
            <div class="student_vise">
               <form action="php/vaucher.php" method="post">

                   <input type="text" name="std_id" id="std_id" placeholder="Student ID">
                   <input type="submit" value="Generate">
               </form>
            </div>
            <?php
            }
            ?>
            <?php
            if (isset($_GET['action']) && @$_GET['action'] == "class") {
            ?>
            <div class="student_vise">
            <form action="php/classvise.php" method="post">

<input type="text" name="class" id="std_id" placeholder="Enter class name">
<input type="submit" value="Generate">
</form>
            </div>
            <?php
            }
            ?>
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