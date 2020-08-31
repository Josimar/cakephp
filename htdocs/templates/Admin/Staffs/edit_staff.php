<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<?=
$this->Html->css(["pickmeup.css"],["block"=>"TopStyleLinks"])
?>
<style>
#frm-edit-staff label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Staff</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Staff</li>
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
             <h3 class="card-title">Edit Staff</h3>
            </div>
            <div class="card-body">
            <?=
            $this->Form->create($staff, [
                "id"=>"frm-edit-staff",
                "type"=>"file"
            ])
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" value="<?= $staff->name ?>" required name="name" id="name" placeholder="Enter name" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>E-mail *</label>
                            <input type="text" value="<?= $staff->email ?>" required name="email" id="email" placeholder="Enter e-mail" class="form-control" />
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>phone *</label>
                            <input type="text" value="<?= $staff->phone ?>" required name="phone" id="phone" placeholder="Enter phone" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" id="address" placeholder="Enter address" class="form-control"><?= $staff->address ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label>Designation</label>
                            <textarea name="designation" id="designation" placeholder="Enter designation" class="form-control"><?= $staff->designation ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select type *</label>
                            <select required class="form-control" name="stafftype" id="stafftype">
                                <option <?= $staff->stafftype == "instructor" ? "selected" : "" ?> value='instructor'>Instructor</option>
                                <option <?= $staff->stafftype == "instructor" ? "selected" : "" ?> value='instructor'>Librarian</option>
                                <option <?= $staff->stafftype == "lab-instructor" ? "selected" : "" ?> value='lab-instructor'>Lab Instructor</option>
                                <option <?= $staff->stafftype == "workshop-instructor" ? "selected" : "" ?> value='workshop-instructor'>Workshop Instructor</option>
                                <option <?= $staff->stafftype == "financial-manager" ? "selected" : "" ?> value='financial-manager'>Financial Manager</option>
                                <option <?= $staff->stafftype == "head-of-department" ? "selected" : "" ?> value='head-of-department'>Head of Department</option>
                                <option <?= $staff->stafftype == "non-technical" ? "selected" : "" ?> value='non-technical'>Non Technical</option>
                                <option <?= $staff->stafftype == "others" ? "selected" : "" ?> value='others'>Others</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gender *</label>
                            <select required class="form-control" name="gender" id="gender">
                                <option <?= $staff->gender == "male" ? "selected" : "" ?> value='male'>Male</option>
                                <option <?= $staff->gender == "female" ? "selected" : "" ?> value='female'>Female</option>
                                <option <?= $staff->gender == "others" ? "selected" : "" ?> value='others'>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select Blood Group *</label>
                            <select required class="form-control" name="bloodgroup" id="bloodgroup">
                                <option <?= $staff->bloodgroup == "A+" ? "selected" : "" ?> value='A+'>A+</option>
                                <option <?= $staff->bloodgroup == "A-" ? "selected" : "" ?> value='A-'>A-</option>
                                <option <?= $staff->bloodgroup == "B+" ? "selected" : "" ?> value='B+'>B+</option>
                                <option <?= $staff->bloodgroup == "B-" ? "selected" : "" ?> value='B-'>B-</option>
                                <option <?= $staff->bloodgroup == "O+" ? "selected" : "" ?> value='O+'>O+</option>
                                <option <?= $staff->bloodgroup == "O-" ? "selected" : "" ?> value='O-'>O-</option>
                                <option <?= $staff->bloodgroup == "AB+" ? "selected" : "" ?> value='AB+'>AB+</option>
                                <option <?= $staff->bloodgroup == "AB-" ? "selected" : "" ?> value='AB-'>AB-</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Url image</label>
                            <input type="file" name="urlimage" id="urlimage" class="form-control" />
                            <br/>
                            <?php
                                if ($staff->urlimage != "") {
                                    echo ($this->Html->image("/upload/".$staff->urlimage, ["style"=>"width:70px;height:70px"]));
                                }
                            ?>
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
                                <option <?= $staff->status == "1" ? "selected" : "" ?> value='1'>Active</option>
                                <option <?= $staff->status == "0" ? "selected" : "" ?> value='0'>Inactive</option>
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
echo('$("#frm-edit-staff").validate();');
echo('pickmeup("input#dob", {hide_on_select: true, position: "right"}).set_date("'.$staff->dob.'");');
$this->Html->scriptEnd();
?>