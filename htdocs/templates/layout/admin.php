<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->fetch("title") ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <?=
      $this->Html->css([
        "/plugins/fontawesome-free/css/all.min.css",
        "/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" ,
        "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        "/plugins/jqvmap/jqvmap.min.css",
        "/dist/css/adminlte.min.css",
        "/plugins/overlayScrollbars/css/OverlayScrollbars.min.css",
      ])
    ?>

<!--
"/plugins/daterangepicker/daterangepicker.css",
"/plugins/summernote/summernote-bs4.css"
-->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <?= $this->fetch("TopStyleLinks") ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?= $this->element("top-nav") ?>
    <?= $this->element("left-sidebar") ?>

      <div class="content-wrapper">
        <?= $this->Flash->render() ?>
        <?= $this->fetch("content") ?>
      </div>

  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y") ?>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<?=
    $this->Html->script([
        "/plugins/jquery/jquery.min.js",
        "/plugins/jquery-ui/jquery-ui.min.js",
        "/plugins/moment/moment.min.js",
        "/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
        "/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js",
        "/dist/js/adminlte.js",
        "/plugins/summernote/summernote-bs4.min.js",
        "/plugins/daterangepicker/daterangepicker.js",
        "/dist/js/pages/dashboard.js"
    ])
?>

<?= $this->fetch("bottomScriptLinks") ?>
<?= $this->fetch("script") ?>

<!-- 
        "/plugins/chart.js/Chart.min.js",
        "/plugins/sparklines/sparkline.js",
        "/plugins/jqvmap/jquery.vmap.min.js",
        "/plugins/jqvmap/maps/jquery.vmap.usa.js",
        "/plugins/jquery-knob/jquery.knob.min.js",
        "/dist/js/demo.js"
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
!-->
</body>
</html>
