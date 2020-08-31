<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }

?>
<style>
#frm-edit-transporte label.error{
    color: red;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Transporte</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Transporte</li>
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
             <h3 class="card-title">Edit Transporte</h3>
            </div>
            <div class="card-body">
            <?= $this->Form->create($transporte, [
                "id" => "frm-edit-transporte",
                "type" => "file"
            ])
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" value="<?= $transporte->nome ?>" required name="nome" id="nome" placeholder="Enter name" class="form-control" />
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="descricao" id="descricao" placeholder="Enter description" class="form-control"><?= $transporte->descricao ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Image url</label>
                            <input type="file" name="urlfoto" id="urlfoto" class="form-control" />
                            <br/>
                            <?php
                                if ($transporte->urlfoto != "") {
                                    echo ($this->Html->image("/upload/".$transporte->urlimage, ["style"=>"width:70px;height:70px"]));
                                }
                            ?>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Video url</label>
                            <input type="text" value="<?= $transporte->urlvideo ?>" name="urlvideo" id="urlvideo" placeholder="Enter url video" class="form-control" />
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" value="<?= $transporte->latitude ?>" name="latitude" id="latitude" placeholder="Enter latitude" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" value="<?= $transporte->longitude ?>" name="longitude" id="longitude" placeholder="Enter longitude" class="form-control" />
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tipo *</label>
                            <select required class="form-control" name="tipo" id="tipo">
                                <option <?= $transporte->tipo == "luxo" ? "selected" : "" ?> value='luxo'>Luxo</option>
                                <option <?= $transporte->tipo == "popular" ? "selected" : "" ?> value='popular'>Popular</option>
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
    "jquery.validate.min.js"
  ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
echo('$("#frm-edit-transporte").validate();');
$this->Html->scriptEnd();
?>