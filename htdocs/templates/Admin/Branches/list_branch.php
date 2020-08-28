<?php
if (!empty($title)){
    $this->assign("title", $title);
}
$this->Html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
],["block"=>"TopStyleLinks"]);
?>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>List Branch</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Branch</li>
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
                    <h3 class="card-title">List Branch</h3>
                </div>
                <div class="card-body">
                <table id="tbl-branch" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Branch Info</th>
                    <th>College Name</th>
                    <th>Total Seats</th>
                    <th>Total Durations</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      if (count($branches) > 0){
                        foreach($branches as $index => $branch){
                          ?>
                          <tr>
                            <td><?= $branch->id ?></td>
                            <td><?= "<b>Name:</b> ".$branch->name."<br/><b>SessionStart:</b> ".$branch->startdate."<br/><b>SessionEnd:</b> ".$branch->enddate ?></td>
                            <td><?= isset($branch->branch_college->name) ? $branch->branch_college->name : "N/A" ?></td>
                            <td><?= $branch->totalseats ?></td>
                            <td><?= $branch->totaldurations ?></td>
                            <td>
                              <form id="frm-delete-branch-<?= $branch->id ?>" action="<?= $this->Url->build('/admin/delete-branch'.$branch->id) ?>" method="post">
                                <input type="hidden" value="<?= $branch->id ?>" name="id" id="id">
                              </form>
                              <a href="<?= $this->Url->build('/admin/edit-branch/'.$branch->id, ['fullBase'=>true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-branch-<?= $branch->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#ID</th>
                    <th>Branch Info</th>
                    <th>College Name</th>
                    <th>Total Seats</th>
                    <th>Total Durations</th>
                    <th>Action</th>
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
    "/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"
  ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
echo('$("#tbl-branch").DataTable();');
$this->Html->scriptEnd();
?>