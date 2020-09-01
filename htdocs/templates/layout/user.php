<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->fetch("title") ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <?=
    $this->Html->css([
        "/plugins/fontawesome-free/css/all.min.css",
        "/plugins/icheck-bootstrap/icheck-bootstrap.min.css",
        "/dist/css/adminlte.min.css"
    ]);
  ?>
  <style>
    .login-box{margin-top: -70px;}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Controle</b>Login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      
      <?= $this->Flash->render() ?>

      <?= $this->fetch("content"); ?>
    </div>
  </div>
</div>

<?=
    $this->Html->script([
        "/plugins/jquery/jquery.min.js",
        "/plugins/bootstrap/js/bootstrap.bundle.min.js",
        "/dist/js/adminlte.js"
    ])
?>

</body>
</html>
