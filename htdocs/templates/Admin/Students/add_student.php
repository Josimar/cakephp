<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<?=
$this->Html->css(["pickmeup.css"],["block"=>"TopStyleLinks"])
?>
<style>
#frm-add-student label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add Student</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Student</li>
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
             <h3 class="card-title">Add Student</h3>
            </div>
            <div class="card-body">
            <?=
            $this->Form->create($student, [
                "id"=>"frm-add-student",
                "type"=>"file"
            ])
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" required name="name" id="name" placeholder="Enter name" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>E-mail *</label>
                            <input type="text" required name="email" id="email" placeholder="Enter e-mail" class="form-control" />
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>phone *</label>
                            <input type="text" required name="phone" id="phone" placeholder="Enter phone" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address" placeholder="Enter address" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender *</label>
                            <select required class="form-control" name="gender" id="gender">
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                                <option value='others'>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select Blood Group *</label>
                            <select required class="form-control" name="bloodgroup" id="bloodgroup">
                                <option value='A+'>A+</option>
                                <option value='A-'>A-</option>
                                <option value='B+'>B+</option>
                                <option value='B-'>B-</option>
                                <option value='O+'>O+</option>
                                <option value='O-'>O-</option>
                                <option value='AB+'>AB+</option>
                                <option value='AB-'>AB-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Url image</label>
                            <input type="file" name="urlimage" id="urlimage" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Dob</label>
                            <input type="text" name="dob" id="dob" placeholder="Enter dob" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Status *</label>
                            <select required class="form-control" name="status" id="status">
                                <option value='1'>Active</option>
                                <option value='0'>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <button name="btn_submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            <?= $this->Form->end() ?>
            </div>
        </div>
        </div>
    </div>
  </div>
</section>

<?=
$this->Html->script([
    "jquery.validate.min.js",
    "pickmeup.js"
    ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
echo('$("#frm-add-student").validate();');
echo('pickmeup("input#dob", {hide_on_select: true, position: "right"});');
$this->Html->scriptEnd();
?>