<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<style>
#frm-add-college label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Add Permissão</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Permissão</li>
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
             <h3 class="card-title">Add Permissão</h3>
            </div>
            <div class="card-body">
            <form id="frm-add-permissao">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" required name="nome" id="nome" placeholder="Enter name" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descricao" id="descricao" placeholder="Enter description" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image url *</label>
                            <input type="file" required name="urlfoto" id="urlfoto" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Video url *</label>
                            <input type="file" required name="urlvideo" id="urlvideo" class="form-control" />
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" id="latitude" placeholder="Enter latitude" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" id="longitude" placeholder="Enter longitude" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Status *</label>
                            <select required class="form-control" name="status" id="status">
                                <option value='luxo'>Luxo</option>
                                <option value='popular'>Popular</option>
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
            </form>
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
echo('$("#frm-add-permissao").validate();');
$this->Html->scriptEnd();
?>