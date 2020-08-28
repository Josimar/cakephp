  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= $this->Url->build('/admin', ['fullbase'=>true]) ?>" class="brand-link">
      <?= 
        $this->Html->image("/dist/img/AdminLTELogo.png", 
          ["alt"=>"Logo", "class"=>"brand-image img-circle elevation-3", "style"=>"opacity: .8"]
        ) ?>
      <span class="brand-text font-weight-light">Academic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?= 
          $this->Html->image("/dist/img/user2-160x160.jpg", 
            ["alt"=>"User image", "class"=>"img-circle elevation-2"]
          ) ?>
        </div>
        <div class="info">
          <a href="#" class="d-block">Josimar Silva</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?= $this->Url->build('/admin', ['fullbase'=>true]) ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> 
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Manage Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-user', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-users', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p>
                Manage College
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-college', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add College</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-colleges', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List College</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Manage Branch
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-branch', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Branch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-branches', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Branch</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Manage Student
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-student', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-students', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Student</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-staff', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-staffs', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Staff</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Manage Transporte
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-transporte', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Transporte</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-transporte', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Transporte</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Manage Papeis
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-papel', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Papel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-papel', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Papeis</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Manage Permissão
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/add-permissao', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Permissão</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/list-permissoes', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Permissão</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/college-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>College Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/student-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/staff-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/transporte-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transporte Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/user-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/papel-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Papel Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= $this->Url->build('/admin/permissao-report', ['fullbase'=>true]) ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permissão Report</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>