<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin/img/user-profile.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ url("dashboard") }}" class="d-block">{{ $user->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="{{ url('dashboard/categories') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Categories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('dashboard/skills') }}" class="nav-link">
            <i class="nav-icon fas fa-brain"></i>
            <p>
              Skills
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('dashboard/exams') }}" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              Exams
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('dashboard/students') }}" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Students
            </p>
          </a>
        </li>
        @if (Auth::user()->role->name == 'superadmin')
          <li class="nav-item">
            <a href="{{ url('dashboard/admins') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Admins
              </p>
            </a>
          </li>
        @endif
        <li class="nav-item">
          <a href="{{ url('dashboard/messages') }}" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Messages
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>