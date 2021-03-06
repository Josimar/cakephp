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
        <h1>List College</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List College</li>
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
                    <h3 class="card-title">List College</h3>
                </div>
                <div class="card-body">
                <table id="tbl-colleges" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>College Info</th>
                    <th>Short Name</th>
                    <th>Cover Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (count($colleges) > 0){
                        foreach($colleges as $index => $college){
                          ?>
                          <tr>
                            <td><?= $college->id ?></td>
                            <td><?= "<b>Name:</b> ".$college->name."<br/><b>Email:</b> ".$college->email."<br/><b>Phone:</b> ".$college->phone ?></td>
                            <td><?= $college->shortname ?></td>
                            <td><?= $this->Html->image("/upload/".$college->imageurl, ["style"=>"width:70px;height:70px"]) ?></td>
                            <td>
                              <form id="frm-delete-college-<?= $college->id ?>" action="<?= $this->Url->build('/admin/delete-college'.$college->id) ?>" method="post">
                                <input type="hidden" value="<?= $college->id ?>" name="id" id="id">
                              </form>
                              <a href="<?= $this->Url->build('/admin/edit-college/'.$college->id, ['fullBase'=>true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-college-<?= $college->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
                    <th>College Info</th>
                    <th>Short Name</th>
                    <th>Cover Image</th>
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
echo('$("#tbl-colleges").DataTable();');
$this->Html->scriptEnd();
?>