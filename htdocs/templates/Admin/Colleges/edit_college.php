<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<style>
#frm-edit-college label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit College</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit College</li>
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
             <h3 class="card-title">Edit College</h3>
            </div>
            <div class="card-body">
            <?=
                $this->Form->create($college, [
                    "id"=>"frm-edit-college",
                    "type"=>"file"
                ])
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" value="<?= $college->name ?>" required name="name" id="name" placeholder="Enter name" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Short name *</label>
                            <input type="text" value="<?= $college->shortname ?>" required name="shortname" id="shortname" placeholder="Enter short name" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>E-mail *</label>
                            <input type="text" value="<?= $college->email ?>" required name="email" id="email" placeholder="Enter e-mail" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="text" value="<?= $college->phone ?>" required name="phone" id="phone" placeholder="Enter description" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" id="description" placeholder="Enter description" class="form-control"><?= $college->description ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Location *</label>
                            <textarea required name="location" id="location" placeholder="Enter location" class="form-control"><?= $college->location ?></textarea>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Total faculty</label>
                            <input type="number" min="10" value="<?= $college->totalfaculty ?>" name="totalfaculty" id="totalfaculty" placeholder="Enter total faculty" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Status *</label>
                            <select required class="form-control" name="status" id="status">
                                <option <?= $college->status == 1 ? "selected" : "" ?> value='1'>Active</option>
                                <option <?= $college->status == 0 ? "selected" : "" ?> value='0'>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image url</label>
                            <input type="file" name="imageurl" id="imageurl" class="form-control" />
                            <br/>
                            <?= $this->Html->image("/upload/".$college->imageurl, ["style"=>"width:100px;height:100px"]) ?>
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
    "jquery.validate.min.js"
  ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
echo('$("#frm-edit-college").validate();');
$this->Html->scriptEnd();
?>