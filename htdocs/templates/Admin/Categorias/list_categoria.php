<?php
if (!empty($title)){
    $this->assign("title", $title);
}
$this->Html->css([
//    "/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
],["block"=>"TopStyleLinks"]);
?>
<style>
.pagination{
    position: relative;
    float: right;
}
.pagination > li {
    padding: 6px 12px;
    line-height: 1.428571429;
    text-decoration: none;
    border: 1px solid #dddddd;
    border-color: gray;
}
</style>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>List Categoria</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Categoria</li>
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
                    <h3 class="card-title">List Categoria</h3>
                    <?php
                    $paginator = $this->Paginator;
                    echo "<div class='pagination' id='pagination'>";
                    echo $paginator->first('First');
                    echo " ";
                    if($paginator->hasPrev()){
                        echo $paginator->prev('<<');
                    }
                    echo $paginator->numbers(array('modulus' =>3)); 
                    if($paginator->hasNext()){
                        echo $paginator->next('>>');
                    }
                    echo $paginator->last('Last');
                    echo "</div>";
                    ?>
                </div>
                <div class="card-body">
                <table id="tbl-categoria" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Categoria ID</th>
                    <th>Descrição</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  if (count($categorias) > 0){
                    foreach($categorias as $index => $row){
                        ?>
                        <tr>
                            <td><?= $row->id ?></td>
                            <td><?= $row->categoriaid ?></td>
                            <td><?= $row->descricao ?></td>
                            <td></td>
                        </tr>
                        <?php 
                    }
                  } 
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#ID</th>
                    <th>Categoria ID</th>
                    <th>Descrição</th>
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
//    "/plugins/datatables/jquery.dataTables.min.js",
//    "/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"
  ], [
    "block"=>"bottomScriptLinks"
]);
?>

<?php
$this->Html->scriptStart(["block"=>true]);
// echo('$("#tbl-categoria").DataTable();');
$this->Html->scriptEnd();
?>