<style>
    .add {
        margin: auto;
        width: 75%;

    }


    .add th {
        width: 6rem;
        padding: 7px 0px;
    }

    .add textarea {
        margin-top: 3px;
    }

    .add .btn.btn-primary {
        width: 100%;
        margin-top: 11px;
    }

    .panel-heading {
        padding: 10px 15px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        color: #fff;
        background-color: #428bca;
        border-color: #428bca;
        border-top-right-radius: 3px;
    }

    .panel-body {
        padding: 15px;
    }

    .panel {
        margin-bottom: 20px;
        background-color: #fff;
        border: 1px solid transparent;
        border-radius: 4px;
        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .panel-primary {
        border-color: #428bca;
        width: auto;
    margin: auto;
        padding-bottom: 13px;
    }
</style>


<div id="layoutSidenav_content">
  <main>
  <div class="panel panel-primary m-2">
                <div class="panel-heading">
                    Student Fees
                </div>
                <div class="container mt-1">
                    <form action="voucher.php" method="post">

                        <table class="add">
                            <tbody>
                                <tr>
                                    <th> <label for="type">Student</label></th>
                                    <td><select name="type" id="type" class="form-control">
                                            <option value="selecet">Select ...</option>
                                            <option value="credit">Paid</option>
                                            <option value="debit">Recieve</option>

                                        </select></td>
                                </tr>
                                <tr>
                                    <th> <label for="name">Party Name</label></th>
                                    <td><select name="name" id="name" class="form-control" onchange="party(this.value)">
                                            <option value="selecet">Select ... <span>Karachi</span></option>
                                            <?php
                                            $sql = "SELECT * FROM party";
                                            $result = mysqli_query($connection, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $name = $row['name'];
                                                $city = $row['city'];
                                                $id = $row['id'];
                                                echo '<option value="' . $id . '"><p>' . $name . '</p> --- <span >' . $city . '</span></option>';
                                            }
                                            ?>
                                        </select></td>
                                </tr>


                                <tr>
                                    <th> <label for="date">Date</label></th>
                                    <td><input type="date" class="form-control" id="date" name="date" placeholder="dd/mm/yy" required></td>
                                </tr>

                                <tr>
                                    <td><label for="desc">Description</label></td>
                                    <td><textarea name="desc" id="desc" class="form-control" cols="30" rows="4"></textarea></td>

                                </tr>
                                <tr>
                                    <td>
                                        <label for="amount">Amount</label></td>
                                    <td> <input type="text" class="form-control" name="amount" style="width: 200px;"></td>


                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Submit" class="btn btn-primary"></td>
                                </tr>



                            </tbody>
                        </table>
                    </form>
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