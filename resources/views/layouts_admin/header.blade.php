 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="nav-item d-none d-sm-inline-block">
             <a href="/user" class="nav-link">Visit Site <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
         </li>
        
     </ul>

     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">
         <!-- Navbar Search -->
         <li class="nav-item">
            
             <a type="button" class="btn btn-danger"
                            style="border-radius: 20px;padding-right: 22px;padding-left: 22px;" href="/logout">Logout</a>
         </li>

        
     </ul>
 </nav>
 <!-- /.navbar -->

 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/admin" class="brand-link">
         <!-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
         <span class="brand-text font-weight-light"><img src="{{ asset('assets/images/SAFETYCAVE-greyscale-logo.svg')}}" alt="logo" style="width: 183px;margin-top: -39px;position: absolute;"></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <!-- <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> -->
             </div>
             <div class="info">
                 <a href="/admin" class="d-block">Admin</a>
             </div>
         </div>

        
         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <!-- <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Starter Pages
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link active">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Active Page</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Inactive Page</p>
                             </a>
                         </li>
                     </ul>
                 </li> -->
                 <li class="nav-item">
                     <a href="/admin" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Dashboard
                             
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Assets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/models" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Models</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/assets" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Variations</p>
                </a>
              </li>
              
            </ul>
          </li>
                 <li class="nav-item">
                     <a href="/admin/packages" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Packages
                             
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="/admin/users" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Users
                             
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="/admin/orders" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Orders
                             
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="/admin/coupons" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Coupons
                             
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>