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
        <h1>List Transporte</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Transporte</li>
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
                    <h3 class="card-title">List Transporte</h3>
                </div>
                <div class="card-body">
                <table id="tbl-transporte" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (count($transportes) > 0){
                      foreach($transportes as $index => $transporte){
                        ?>
                        <tr>
                          <td><?= $transporte->id ?></td>
                          <td><?= $transporte->nome ?></td>
                          <td><?= $transporte->descricao ?></td>
                          <td>
                            <?= $transporte->tipo ?><br />
                            <?php 
                            if (isset($transporte->urlfoto) && $transporte->urlfoto !== '') {
                              echo($this->Html->image("/upload/".$transporte->urlfoto, ["style"=>"width:70px;height:70px"]));
                            }
                            ?>
                          </td>
                          <td nowrap>
                            <form id="frm-delete-transporte-<?= $transporte->id ?>" action="<?= $this->Url->build('/admin/delete-transporte/'.$transporte->id, ['fullBase'=>true]) ?>" method="post">
                              <input type="hidden" value="<?= $transporte->id ?>" name="id" id="id">
                            </form>
                            <a href="<?= $this->Url->build('/admin/edit-transporte/'.$transporte->id, ['fullBase'=>true]) ?>" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>
                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-transporte-<?= $transporte->id ?>').submit() }" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
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
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
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
echo('$("#tbl-transporte").DataTable();');
$this->Html->scriptEnd();
?>