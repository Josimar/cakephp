<?php
if (!empty($title)){
    $this->assign("title", $title);
}
$this->Html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css",
    "/buttons.dataTables.min.css"
],["block"=>"TopStyleLinks"]);
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Student Report</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Student Report</li>
        </ol>
        </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Student Report</h3>
                </div>
                <div class="card-body">
                <table id="tbl-student-report" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Student Info</th>
                    <th>College/Branch</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      if (count($students) > 0){
                        foreach($students as $index => $student){
                          ?>
                          <tr>
                            <td><?= $student->id ?></td>
                            <td>
                              <?= "<b>Name: </b>".$student->name ?><br/>
                              <?= "<b>Email: </b>".$student->email ?><br/>
                              <?= "<b>Phone: </b>".$student->phone ?><br/>
                              <?= "<b>BG: </b>".$student->bloodgroup ?><br/>
                            </td>
                            <td>
                              <?php
                              if (isset($student->student_college->name) && isset($student->student_branch->name)){
                                echo "<b>College:</b> ".$student->student_college->name;
                                echo "<br />";
                                echo "<b>Branch:</b> ".$student->student_branch->name;
                                echo "<br />";
                              }else{
                                echo '<i>N/A</i>';
                              }
                              ?>
                            </td>
                            <td><?= strtoupper($student->gender) ?></td>
                            <td><?= $this->Html->image("/upload/".$student->urlimage, ["style"=>"width:70px;height:70px"]) ?></td>
                            <td><?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#ID</th>
                    <th>Student Info</th>
                    <th>College/Branch</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Status</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
        </div>
    </div>
  </div>
</section>

<?=
$this->Html->script([
    "/plugins/datatables/jquery.dataTables.min.js",
    "/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js",
    "dataTables.buttons.min.js",
    "jszip.min.js",
    "pdfmake.min.js",
    "vfs_fonts.js",
    "buttons.html5.min.js"
  ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
echo("$('#tbl-student-report').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
} );");
$this->Html->scriptEnd();
?>