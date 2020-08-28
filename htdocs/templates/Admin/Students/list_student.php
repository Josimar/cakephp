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
        <h1>List Student</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Student</li>
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
                    <h3 class="card-title">List Student</h3>
                </div>
                <div class="card-body">
                <table id="tbl-students" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Student Info</th>
                    <th>College/Branch</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Status</th>
                    <th>Action</th>
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
                              <?= "<b>Name:</b>".$student->name ?><br/>
                              <?= "<b>Email:</b>".$student->email ?><br/>
                              <?= "<b>Phone:</b>".$student->phone ?><br/>
                              <?= "<b>BG:</b>".$student->bloodgroup ?><br/>
                            </td>
                            <td>
                              <button class="btn btn-info btn-allot-modal" data-id="<?= $student->id ?>" data-toggle="modal" data-target="#studentModal">Allow College</button>
                            </td>
                            <td><?= strtoupper($student->gender) ?></td>
                            <td><?= $this->Html->image("/upload/".$student->urlimage, ["style"=>"width:70px;height:70px"]) ?></td>
                            <td><?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
                            <td>
                              <form id="frm-delete-student-<?= $student->id ?>" action="<?= $this->Url->build('/admin/delete-student'.$student->id) ?>" method="post">
                                <input type="hidden" value="<?= $student->id ?>" name="id" id="id">
                              </form>
                              <a href="<?= $this->Url->build('/admin/edit-student/'.$student->id, ['fullBase'=>true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-college-<?= $student->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
                    <th>Student Info</th>
                    <th>College/Branch</th>
                    <th>Gender</th>
                    <th>Profile Image</th>
                    <th>Status</th>
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

<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Assign College/Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="javascript:void(0)" method="post">
        <div class="form-group row">
          <label for="dd_college" class="col-sm-4 col-form-label">Select College</label>
          <div class="col-sm-8">
            <select name="dd_college" id="dd_college" class="form-control">
              <option value="">Choose College</option>
              <?php
                if (count($colleges) > 0){
                  foreach($colleges as $index => $college){
                    ?>
                    <option value="<?= $college->id ?>"><?= $college->name ?></option>
                    <?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label for="dd_branch" class="col-sm-4 col-form-label">Select Branch</label>
          <div class="col-sm-8">
            <select name="dd_branch" id="dd_branch" class="form-control">
              <option value="">Choose Branch</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

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
echo('$("#tbl-students").DataTable();');
echo('$(document).on("change", "#dd_college", function(){
  var collegid = $(this).val(); 
  var postdata = "collegeid="+collegid;
  $.get("'.$this->Url->build("/admin/allot-college", ["fullBase"=>true]).'", postdata, function(response){
    var data = $.parseJSON(response);
    if (data.status == 200){
      var branchHtml = "<option value=\'\'>Choose Branch</option>";
      $.each(data.branches, function(index, item){
        branchHtml += "<option value=\'"+item.id+"\'>"+item.name+"</option>";
      });
      $("#dd_branch").html(branchHtml);
    }
  })
})');
$this->Html->scriptEnd();
?>