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
        <h1>Staff Report</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Staff Report</li>
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
                    <h3 class="card-title">Staff Report</h3>
                </div>
                <div class="card-body">
                <table id="tbl-staff-report" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Staff Info</th>
                    <th>College/Branch</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      if (count($staffs) > 0){
                        foreach($staffs as $index => $staff){
                          ?>
                          <tr>
                            <td><?= $staff->id ?></td>
                            <td>
                              <?= "<b>Name: </b>".$staff->name ?><br/>
                              <?= "<b>Email: </b>".$staff->email ?><br/>
                              <?= "<b>Phone: </b>".$staff->phone ?><br/>
                              <?= "<b>BG: </b>".$staff->bloodgroup ?><br/>
                              <?= "<b>Staff Type: </b>".$staff->stafftype ?><br/>
                              <?= "<b>Designation: </b>".$staff->designation ?>
                            </td>
                            <td>
                              <?php
                              // dd($staff);
                              if (isset($staff->staff_college->name) && isset($staff->staff_branch->name)){
                                echo "<b>College:</b> ".$staff->staff_college->name;
                                echo "<br />";
                                echo "<b>Branch:</b> ".$staff->staff_branch->name;
                                echo "<br />";
                              }else{
                                echo '<i>N/A</i>';
                              }
                              ?>
                            </td>
                            <td><?= strtoupper($staff->gender) ?></td>
                            <td><?= $this->Html->image("/upload/".$staff->urlimage, ["style"=>"width:70px;height:70px"]) ?></td>
                            <td><?= $staff->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#ID</th>
                    <th>Staff Info</th>
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
echo("$('#tbl-staff-report').DataTable( {
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