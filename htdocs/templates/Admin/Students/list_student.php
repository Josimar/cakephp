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
                              <?= "<b>Name: </b>".$student->name ?><br/>
                              <?= "<b>Email: </b>".$student->email ?><br/>
                              <?= "<b>Phone: </b>".$student->phone ?><br/>
                              <?= "<b>BG: </b>".$student->bloodgroup ?><br/>
                            </td>
                            <td>
                              <?php
                              // dd($student);
                              if (isset($student->student_college->name) && isset($student->student_branch->name)){
                                echo "<b>College:</b> ".$student->student_college->name;
                                echo "<br />";
                                echo "<b>Branch:</b> ".$student->student_branch->name;
                                echo "<br />";
                                ?>
                                  <form action="<?= $this->Url->build('/admin/remove-assigned-college/'.$student->id, ['fullBase'=>true]) ?>" method="post" id="frm-remove-allot-<?= $student->id ?>">
                                    <input type="hidden" name="studentid" value="<?= $student->id ?>" />
                                  </form>
                                  <a href="javascript:void(0)" class="btn-allot-modal" data-id="<?= $student->id ?>" data-toggle="modal" data-target="#studentModal">Change</a> | 
                                  <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to remove?')){ $('#frm-remove-allot-<?= $student->id ?>').submit() }" class="link-remove-college-branch" data-id="<?= $student->id ?>">Remove</a>
                                <?php
                              }else{
                                ?>
                                <button class="btn btn-info btn-allot-modal" data-id="<?= $student->id ?>" data-toggle="modal" data-target="#studentModal">Allow College</button>
                                <?php
                              }
                              ?>
                            </td>
                            <td><?= strtoupper($student->gender) ?></td>
                            <td><?= $this->Html->image("/upload/".$student->urlimage, ["style"=>"width:70px;height:70px"]) ?></td>
                            <td><?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?></td>
                            <td>
                              <form id="frm-delete-student-<?= $student->id ?>" action="<?= $this->Url->build('/admin/delete-student'.$student->id, ['fullBase'=>true]) ?>" method="post">
                                <input type="hidden" value="<?= $student->id ?>" name="id" id="id">
                              </form>
                              <a href="<?= $this->Url->build('/admin/edit-student/'.$student->id, ['fullBase'=>true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                              <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-student-<?= $student->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
      <form id="frm_allot-college" method="post" action="<?= $this->Url->build('/admin/assign-college', ['fullBase'=>true]) ?>">
        <input type="hidden" id="studentid" name="studentid" value="" />
        <div class="form-group row">
          <label for="dd_college" class="col-sm-4 col-form-label">Select College</label>
          <div class="col-sm-8">
            <select name="collegeid" id="dd_college" class="form-control">
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
          <label for="branchid" class="col-sm-4 col-form-label">Select Branch</label>
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
      <?= $this->Form->end() ?>
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

// click event
echo '$(document).on("click", ".btn-allot-modal", function(){
  var studentid = $(this).attr("data-id");
  $("#studentid").val(studentid);
});';

// Ajax request
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