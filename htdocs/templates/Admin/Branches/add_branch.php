<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<?=
$this->Html->css(["pickmeup.css"],["block"=>"TopStyleLinks"])
?>
<style>
#frm-add-branch label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add Branch</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Branch</li>
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
             <h3 class="card-title">Add Branch</h3>
            </div>
            <div class="card-body">
            <?=
            $this->Form->create($branch, [
                "id"=>"frm-add-branch"
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
                            <label>Description</label>
                            <textarea name="description" id="description" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select College *</label>
                            <select required class="form-control" name="collegeid" id="collegeid">
                                <option value=''>Choose College</option>
                                <?php
                                    if (count($colleges) > 0){
                                        foreach ($colleges as $index => $college){
                                            echo ("<option value='.$college->id.'>".$college->name."</option>");
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Total seats</label>
                            <input type="number" min="150" name="totalseats" id="totalseats" placeholder="Enter total seats" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Total durations</label>
                            <input type="number" min="1" name="totaldurations" id="totaldurations" placeholder="Enter total durations" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Start date</label>
                            <input type="text" name="startdate" id="startdate" placeholder="Enter start date" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>End date</label>
                            <input type="text" name="enddate" id="enddate" placeholder="Enter end date" class="form-control" />
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
echo('$("#frm-add-branch").validate();');
echo('pickmeup("input#startdate", {hide_on_select: true, position: "right"});');
echo('pickmeup("input#enddate", {hide_on_select: true, position: "right"});');
$this->Html->scriptEnd();
?>