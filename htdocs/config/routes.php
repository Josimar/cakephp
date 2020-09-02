<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

$routes->setRouteClass(DashedRoute::class);

/* Application Routes */
Router::prefix("admin", function(RouteBuilder $route){
    $route->connect("/", ["controller"=>"Dashboards", "action"=>"index"]);

    $route->connect("/users/login", ["controller"=>"Users", "action"=>"login"]);
    $route->connect("/users/dashboard", ["controller"=>"Users", "action"=>"index"]);
    $route->connect("/users/logout", ["controller"=>"Users", "action"=>"logout"]);

    // Colleges routes
    $route->connect("/add-college", ["controller"=>"Colleges", "action"=>"addCollege"]);
    $route->connect("/list-colleges", ["controller"=>"Colleges", "action"=>"listCollege"]);
    $route->connect("/edit-college/:id", ["controller"=>"Colleges", "action"=>"editCollege"], ["pass"=>["id"]]);
    $route->connect("/delete-college/:id", ["controller"=>"Colleges", "action"=>"deleteCollege"], ["pass"=>["id"]]);

    // Branch routes
    $route->connect("/add-branch", ["controller"=>"Branches", "action"=>"addBranch"]);
    $route->connect("/list-branches", ["controller"=>"Branches", "action"=>"listBranch"]);
    $route->connect("/edit-branch/:id", ["controller"=>"Branches", "action"=>"editBranch"], ["pass"=>["id"]]);
    $route->connect("/delete-branch/:id", ["controller"=>"Branches", "action"=>"deleteBranch"], ["pass"=>["id"]]);

    // Student routes
    $route->connect("/add-student", ["controller"=>"Students", "action"=>"addStudent"]);
    $route->connect("/list-students", ["controller"=>"Students", "action"=>"listStudent"]);
    $route->connect("/edit-student/:id", ["controller"=>"Students", "action"=>"editStudent"], ["pass"=>["id"]]);
    $route->connect("/delete-student/:id", ["controller"=>"Students", "action"=>"deleteStudent"], ["pass"=>["id"]]);

    // Staff routes
    $route->connect("/add-staff", ["controller"=>"Staffs", "action"=>"addStaff"]);
    $route->connect("/list-staffs", ["controller"=>"Staffs", "action"=>"listStaff"]);
    $route->connect("/edit-staff/:id", ["controller"=>"Staffs", "action"=>"editStaff"], ["pass"=>["id"]]);
    $route->connect("/delete-staff/:id", ["controller"=>"Staffs", "action"=>"deleteStaff"], ["pass"=>["id"]]);

    // Categorias routes
    $route->connect("/add-categoria", ["controller"=>"Categorias", "action"=>"addCategoria"]);
    $route->connect("/list-categoria", ["controller"=>"Categorias", "action"=>"listCategoria"]);
    $route->connect("/edit-categoria/:id", ["controller"=>"Categorias", "action"=>"editCategoria"], ["pass"=>["id"]]);
    $route->connect("/delete-categoria/:id", ["controller"=>"Categorias", "action"=>"deleteCategoria"], ["pass"=>["id"]]);

    // Tarefas routes
    $route->connect("/add-tarefa", ["controller"=>"Tarefas", "action"=>"addTarefa"]);
    $route->connect("/list-tarefa", ["controller"=>"Tarefas", "action"=>"listTarefa"]);
    $route->connect("/edit-tarefa/:id", ["controller"=>"Tarefas", "action"=>"editTarefa"], ["pass"=>["id"]]);
    $route->connect("/delete-tarefa/:id", ["controller"=>"Tarefas", "action"=>"deleteTarefa"], ["pass"=>["id"]]);

    // Papeis routes
    $route->connect("/add-papel", ["controller"=>"Papeis", "action"=>"addPapel"]);
    $route->connect("/list-papel", ["controller"=>"Papeis", "action"=>"listPapel"]);
    $route->connect("/edit-papel/:id", ["controller"=>"Papeis", "action"=>"editPapel"], ["pass"=>["id"]]);
    $route->connect("/delete-papel/:id", ["controller"=>"Papeis", "action"=>"deletePapel"], ["pass"=>["id"]]);

    // Users routes
    $route->connect("/add-user", ["controller"=>"Users", "action"=>"addUser"]);
    $route->connect("/list-user", ["controller"=>"Users", "action"=>"listUser"]);
    $route->connect("/edit-user/:id", ["controller"=>"Users", "action"=>"editUser"], ["pass"=>["id"]]);
    $route->connect("/delete-user/:id", ["controller"=>"Users", "action"=>"deleteUser"], ["pass"=>["id"]]);

    // Permissao routes
    $route->connect("/add-permissao", ["controller"=>"Permissoes", "action"=>"addPermissao"]);
    $route->connect("/list-permissao", ["controller"=>"Permissoes", "action"=>"listPermissao"]);
    $route->connect("/edit-permissao/:id", ["controller"=>"Permissoes", "action"=>"editPermissao"], ["pass"=>["id"]]);
    $route->connect("/delete-permissao/:id", ["controller"=>"Permissoes", "action"=>"deletePermissao"], ["pass"=>["id"]]);

    // Transportes routes
    $route->connect("/add-transporte", ["controller"=>"Transportes", "action"=>"addTransporte"]);
    $route->connect("/list-transporte", ["controller"=>"Transportes", "action"=>"listTransporte"]);
    $route->connect("/edit-transporte/:id", ["controller"=>"Transportes", "action"=>"editTransporte"], ["pass"=>["id"]]);
    $route->connect("/delete-transporte/:id", ["controller"=>"Transportes", "action"=>"deleteTransporte"], ["pass"=>["id"]]);

    // Reports routes
    $route->connect("/college-report", ["controller"=>"Reports", "action"=>"collegeReports"]);
    $route->connect("/student-report", ["controller"=>"Reports", "action"=>"studentReports"]);
    $route->connect("/staff-report", ["controller"=>"Reports", "action"=>"staffReports"]);
    $route->connect("/papel-report", ["controller"=>"Reports", "action"=>"papelReports"]);
    $route->connect("/permissao-report", ["controller"=>"Reports", "action"=>"permissaoReports"]);
    $route->connect("/transporte-report", ["controller"=>"Reports", "action"=>"transporteReports"]);
    $route->connect("/user-report", ["controller"=>"Reports", "action"=>"userReports"]);
    $route->connect("/papel-report", ["controller"=>"Reports", "action"=>"papelReports"]);
    $route->connect("/tarefa-report", ["controller"=>"Reports", "action"=>"tarefaReports"]);
    $route->connect("/categoria-report", ["controller"=>"Reports", "action"=>"categoriaReports"]);

    $route->connect("/allot-college", ["controller"=>"Students", "action"=>"getCollegeBranches"]);
    $route->connect("/assign-college", ["controller"=>"Students", "action"=>"assignCollegeBranch"]);
    $route->connect("/assign-college-staff", ["controller"=>"Staffs", "action"=>"assignCollegeBranch"]);
    $route->connect("/remove-assigned-college/:id", ["controller"=>"Students", "action"=>"removeAssignedCollegeBranch"], ["pass"=>[""]]);
    $route->connect("/remove-assigned-college-staff/:id", ["controller"=>"Staffs", "action"=>"removeAssignedCollegeBranch"], ["pass"=>[""]]);
});

$routes->scope('/', function (RouteBuilder $builder) {
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $builder->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $builder->fallbacks();
});

$routes->scope('/api', function (RouteBuilder $builder) {
     // No $builder->applyMiddleware() here.
     // Connect API actions here.
});

Router::scope('/api', ['_namePrefix' => 'api:'], function (RouteBuilder $routes) {
    $routes->get('/ping', ['controller' => 'Pings'], 'ping');
});
